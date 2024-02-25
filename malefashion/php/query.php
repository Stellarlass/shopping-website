<?php
session_start();
// session_unset();
include("connection.php");
// SignUp
if(isset($_POST["SignUp"])){
    $name = $_POST["uname"];
    $email = $_POST["uemail"];
    $password = $_POST["upassword"];
    $uselect = $_POST["uselect"];
    $query = $pdo -> prepare("insert into tbl_role (UserName,Email,Password,Role)values(:pn,:pe,:pp,:pr)");
    $query -> bindParam("pn",$name);
    $query -> bindParam("pe",$email);
    $query -> bindParam("pp",$password);
    $query -> bindParam("pr",$uselect);
    $query -> execute();
    echo "<script>
    alert('registration complete');
    location.assign('login.php');
    </script>";   
}
// Update password of dealer/employee
if(isset($_POST['Update'])){
    $proId = $_POST['proId'];
    $Profilepassword = $_POST['Profilepassword'];
    $query = $pdo -> prepare("update tbl_role set Password = :pp where Id = :pid");
    $query -> bindParam("pid",$proId);
    $query -> bindParam("pp",$Profilepassword);
    $query -> execute();
    session_unset();
    echo "<script>
            alert('Password successfully changed');
            location.assign('index.php');
          </script>";
}
// Update Display Profile Picture
if(isset($_POST["Updatedisplay"])){
    $dpimgid = $_POST['dpimgid'];
    $dpImageName = $_FILES["dpImage"]["name"];
    $dpTmpName = $_FILES["dpImage"]["tmp_name"];
    $extension = pathinfo($dpImageName, PATHINFO_EXTENSION);
    $designation = "../dashmin/img/displayprofile/".$dpImageName;
    if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
        if(move_uploaded_file($dpTmpName, $designation)){
            $query = $pdo -> prepare("update tbl_role set Dp = :pdp where Id = :pidp");
            $query -> bindParam("pidp",$dpimgid);
            $query -> bindParam("pdp",$dpImageName);
            $query -> execute();
            $_SESSION['userDp']= $dpImageName;
            echo "<script>
            alert('Profile picture updated successfully');
            location.assign('myprofile.php');
            </script>";
           
        }
    }else{
        echo "<script>
        alert('not acceptable');
        </script>";
    }   
}
$productImageAddress = "../dashmin/img/products/";
// addtocart query
if(isset($_POST['addToCart'])){
    if(isset($_SESSION['cart'])){
         // same product ki row repeat na hou uskay liay (start)
         $product = array_column($_SESSION['cart'],"proId");
         if(in_array($_POST['pId'],$product)){
             echo "<script>
             alert('already exist');
             </script>";
         }
         // same product ki row repeat na hou uskay liay (end)
         else{
          $count = count($_SESSION['cart']);
          $_SESSION['cart'][$count]=array("proId"=>$_POST['pId'],"proName"=>$_POST['pName'],"proPrice"=>$_POST['pPrice'],"proQuantity"=>$_POST['pQuantity'],"proImage"=>$_POST['pImage']);
          echo "<script>
          alert('Product added into cart');
          </script>";
         }
    }else{
        $_SESSION['cart'][0]=array("proId"=>$_POST['pId'],"proName"=>$_POST['pName'],"proPrice"=>$_POST['pPrice'],"proQuantity"=>$_POST['pQuantity'],"proImage"=>$_POST['pImage']);
        echo "<script>
        alert('Product added into cart');
        </script>";
    }
}
//  remove product
if(isset($_GET['removeId'])){
    $removeId = $_GET['removeId'];
    foreach($_SESSION['cart'] as $key => $value){
        if($removeId == $value['proId']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>
            alert('product remove from add to cart');
            </script>";
        }
    }
}
// login
if(isset($_POST['logIn'])){
    $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $pdo -> prepare("select * from tbl_role where Email= :pe && Password= :pp");
        $query -> bindParam("pe",$email);
        $query -> bindParam("pp",$password);
        $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if($row){
        $_SESSION["userId"] = $row["Id"];
        $_SESSION["userName"] = $row["UserName"];
        $_SESSION["userEmail"] = $row["Email"];
        $_SESSION["userPassword"] = $row["Password"];
        $_SESSION["userRole"] = $row["Role"];
        $_SESSION['userStatus']= $row['status'];
        $_SESSION["userDp"]= $row['Dp'];
      
        if($_SESSION["userRole"]=="dealer/employee"){
            // for restricting employee from going to index pg without admin's approval
           if($_SESSION['userStatus']=="accept"){
             echo "<script>
             alert('logged in successfully');
             location.assign('../dashmin/index.php');
             </script>";
            }elseif($_SESSION['userStatus']=="reject"){
                echo "<script>
               alert('Your account was not approved');
               location.assign('signup.php');
               </script>";
            }
            else{
                echo "<script>
                alert('waiting for admin approval');
                location.assign('login.php');
                </script>";
            }
        }else if($_SESSION['userRole']=="admin"){

            echo "<script>
            alert('Successfully logged in');
            location.assign('../dashmin/index.php');
            </script>";
        }else
        
        
        {
                echo "<script>
                alert('Successfully logged in');
                location.assign('index.php');
                </script>";
            }
    }
}
// checkout
// function to generate 8 digit order_id
    function generateOrderId() {
        $order_number = mt_rand(10000000, 99999999);
        return $order_number;
    }
if(isset($_POST['checkout'])){
    $proid = $_POST['proid'];
    $uName = $_SESSION['userName'];
    $uId = $_SESSION['userId'];
    $uemail  =  $_SESSION['userEmail'];
    $country = $_POST['country'];
    $uAddress = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $uPhone = $_POST['phone'];    
    $orderinstructions = $_POST['orderinstructions'];
    $uselect = $_POST['uselect'];
    $orderid = generateOrderId();
 //order date
    date_default_timezone_set('Asia/Karachi');
    $now = new DateTime();   
    // Format the date and time
    $formattedDateTime = $now->format('Y-m-d H:i:s');
    $order_date = $formattedDateTime;
 //  
    $uselectdelivery = $_POST['uselectdelivery'];
 //select 1 digit from type of delivery for ordernumber
    $text =  $uselectdelivery;
    // Use regular expression to extract the first digit
    preg_match('/\d/', $text, $matches);
    if (!empty($matches)) {
        $firstDigit = $matches[0];
    }
 //return date
      // one week later timer
     date_default_timezone_set('Asia/Karachi');
     $now = new DateTime();
     $formattedDateTime = $now->format('Y-m-d H:i:s');
     $orderTimestamp = $now->getTimestamp();
     // Calculate the timestamp for 1 week later
     $oneWeekLaterTimestamp = $orderTimestamp + (7 * 24 * 60 * 60);
     $oneWeekLater = new DateTime();
     $oneWeekLater->setTimestamp($oneWeekLaterTimestamp);
     $formattedOneWeekLater = $oneWeekLater->format('Y-m-d H:i:s'); 
     $returndate = $formattedOneWeekLater;

      // generating order number type of the delivery (1 digit), Product id (7 digit), and the order id (8 digit)) 
     $odnumber = $firstDigit.$proid.$orderid;
     
//  for products
     foreach($_SESSION['cart'] as $key => $values){
        $productName = $values['proName'];
        $productQuantity = $values['proQuantity'];
        $productPrice = $values['proPrice'];
        $query = $pdo ->prepare("INSERT INTO `tbl_order`(`order_id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `user_name`, `user_phone`, `user_email`, `user_address`, `user_country`, `user_city`, `user_postalcode`, `order_date`, `delivery_Type`, `payment_type`,`return_date`, `order_number`, `order_instructions`) VALUES (:orderid,:userid,:proid,:proname,:proprice,:proquantity,:uname,:uphone,:uemail,:uaddress,:ucountry,:ucity,:upostalcode,:orderdate,:deltype,:paytype,:retdate,:odnumber,:orderinstructions)");
        $query -> bindParam("orderid",$orderid);
        $query -> bindParam("userid",$uId);
        $query -> bindParam("proid",$proid);
        $query -> bindParam("proname",$productName);
        $query -> bindParam("proprice",$productPrice);
        $query -> bindParam("proquantity",$productQuantity);
        $query -> bindParam("uname",$uName);
        $query -> bindParam("uphone",$uPhone);
        $query -> bindParam("uemail",$uemail);
        $query -> bindParam("uaddress",$uAddress);
        $query -> bindParam("ucountry",$country);
        $query -> bindParam("ucity",$city);
        $query -> bindParam("upostalcode",$postalcode);
        $query -> bindParam("orderdate",$order_date);
        $query -> bindParam("deltype",$uselectdelivery);
        $query -> bindParam("paytype",$uselect);
        $query -> bindParam("retdate",$returndate);
        $query -> bindParam("odnumber",$odnumber);
        $query -> bindParam("orderinstructions",$orderinstructions);
        $query -> execute(); 
        $_SESSION['ordernumber'] = $firstDigit.$proid.$orderid;
        $_SESSION['productQuantity'] = $productQuantity;
        $_SESSION['productprice'] = $productPrice;
        $_SESSION['productname'] = $productName;
        unset($_SESSION['cart']);
    }
        echo"<script>alert('order has been placed');
        location.assign('invoice.php?ordernumber=$_SESSION[ordernumber]');
        </script>";
}
// feedback
if(isset($_POST['feedback'])){
    $user_id = $_SESSION['userId'];
    $productname = $_SESSION['productname'];
    $ordernumber = $_SESSION['ordernumber'];
    $feedback_text = $_POST['feedback_text'];
    $rating = $_POST['rating'];
    $query = $pdo -> prepare("insert into tbl_feedback(`user_id`, `order_number`, `feedback`, `product_name`, `Ratings`) values(:uid,:on,:fb,:pn,:ratings)");
    $query -> bindParam("uid",$user_id);
    $query -> bindParam("pn", $productname);
    $query -> bindParam("on",$ordernumber);
    $query -> bindParam("fb",$feedback_text);
    $query -> bindParam("ratings",$rating );
    $query -> execute(); 
    echo"<script>alert('Thanks for your valuable feedback');
    location.assign('index.php');
    </script>";
}
// ReturnOrder
if(isset($_POST['ReturnOrder'])){
    $OrderId = $_POST['OrderId'];
    $ReturnOrder = $_POST['ReturnOrder'];
    $query = $pdo -> prepare("update tbl_order set return_requested=:prr where order_id=:oid");
    $query -> bindParam("prr",$ReturnOrder);
    $query -> bindParam("oid",$OrderId);
    $query -> execute();
    echo"<script>alert('Your money would be transferred back to you');
    location.assign('index.php');
    document.getElementById('hidediv').style.display='none';
    </script>";   
}
// Replace Order
if(isset($_POST['ReplaceOrder'])){
    $OrderId = $_POST['OrderId'];
    $ReplaceOrder = $_POST['ReplaceOrder'];
    $query = $pdo -> prepare("update tbl_order set replacement_requested=:prr where order_id=:oid");
    $query -> bindParam("prr",$ReplaceOrder);
    $query -> bindParam("oid",$OrderId);
    $query -> execute();
    echo"<script>alert('You can replace it');
    location.assign('index.php');
    document.getElementById('hidediv').style.display='none';
    </script>"; 
    
}
?>
