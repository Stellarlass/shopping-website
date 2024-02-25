<?php
session_start();
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

// SignIn
// if(isset($_POST['SignIn'])){
//     $email = $_POST["uemail"];
//     $password = $_POST["upassword"];
//     $query = $pdo -> prepare("select * from tbl_role where Email=:pe && Password=:pp");
//     $query -> bindParam("pe",$email);
//     $query -> bindParam("pp",$password);
//     $query -> execute();
//     $row = $query -> fetch(PDO::FETCH_ASSOC);
//     if($row){
//         $_SESSION["userId"] = $row["Id"];
//         $_SESSION["userName"] = $row["UserName"];
//         $_SESSION["userEmail"] = $row["Email"];
//         $_SESSION["userPassword"] = $row["Password"];
//         $_SESSION["userRole"] = $row["Role"];
//         $_SESSION['userStatus']= $row['status'];
//         $_SESSION["userDp"]= $row['Dp'];
//         if($_SESSION["userRole"]=="dealer/employee"){
//             // for restricting employee from going to index pg without admin's approval
//            if($_SESSION['userStatus']=="accept"){
//              echo "<script>
//              alert('logged in successfully');
//              location.assign('../../index.php');
//              </script>";
//             }elseif($_SESSION['userStatus']=="reject"){
//                 echo "<script>
//                alert('Your account was not approved');
//                location.assign('signup.php');
//                </script>";
//             }
//             else{
//                 echo "<script>
//                 alert('waiting for admin approval');
//                 location.assign('login.php');
//                 </script>";
//             }
//         }else{
//                 echo "<script>
//                 alert('Successfully logged in');
//                 location.assign('../../index.php');
//                 </script>";
//             }
//     }
// }
// Update password of dealer/employee
if(isset($_POST['Update'])){
    $proId = $_POST['proId'];
    $Profilepassword = $_POST['Profilepassword'];
    $query = $pdo -> prepare("update tbl_role set Password = :pp where Id = :pid");
    $query -> bindParam("pid",$proId);
    $query -> bindParam("pp",$Profilepassword);
    $query -> execute();
    echo "<script>
            alert('Password successfully changed');
            location.assign('myprofile.php');
          </script>";
}
// Update Display Profile Picture
if(isset($_POST["Updatedisplay"])){
    $dpimgid = $_POST['dpimgid'];
    $dpImageName = $_FILES["dpImage"]["name"];
    $dpTmpName = $_FILES["dpImage"]["tmp_name"];
    $extension = pathinfo($dpImageName, PATHINFO_EXTENSION);
    $designation = "img/displayprofile/".$dpImageName;
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
// add category
if(isset($_POST["AddCategory"])){
    $catName = $_POST["catName"];
    $catImageName = $_FILES["catImage"]["name"];
    $catTmpName = $_FILES["catImage"]["tmp_name"];
    $extension = pathinfo($catImageName,PATHINFO_EXTENSION);
    $designation = "img/category/".$catImageName;
    if($extension=="jpg"||$extension=="jpeg"||$extension=="png"||$extension=="webp"){
        if(move_uploaded_file($catTmpName,$designation)){
            $query = $pdo -> prepare("insert into tbl_category(category_name,category_image)values(:pn,:pi)");
            $query -> bindParam("pn",$catName);
            $query -> bindParam("pi",$catImageName);
            $query -> execute();
            echo "<script>
            alert('Category successfully added');
            location.assign('viewcategory.php');
            </script>";
        }
    }else{
        echo "<script>
        alert('Not acceptable');
        </script>";
    }

}
// UpdateCategory
if(isset($_POST['UpdateCategory'])){
    $catId = $_POST['catId'];
    $catName = $_POST['catName'];
    // image uploading
    if(!empty($_FILES["catImage"]["name"])){
        $catImageName = $_FILES["catImage"]["name"];
        $catTmpName = $_FILES["catImage"]["tmp_name"];
        $extension = pathinfo($catImageName,PATHINFO_EXTENSION);
        $designation = "img/category/".$catImageName;
        if($extension=="jpg"||$extension=="jpeg"||$extension=="png"||$extension=="webp"){
           if(move_uploaded_file($catTmpName,$designation)){
               $query = $pdo -> prepare("update tbl_category set category_name =:pn, category_image =:pi where category_id =:cid");
               $query -> bindParam("pn",$catName);
               $query -> bindParam("pi",$catImageName);
               $query -> bindParam("cid",$catId);
               $query -> execute();
               echo "<script>
               alert('Category successfully updated with image');
               location.assign('viewcategory.php');
               </script>";
            }else{
            echo "<script>
            alert('Not acceptable');
            </script>";
            }         
        }
    }else{
        $query = $pdo -> prepare("update tbl_category set category_name =:pn where category_id =:cid");
        $query -> bindParam("pn",$catName);
        $query -> bindParam("cid",$catId);
        $query -> execute();
        echo "<script>
        alert('Category successfully updated without image');
        location.assign('viewcategory.php');
        </script>";

    }
}
// deleteCategory
if(isset($_GET['deleteCat'])){
    $deleteCat = $_GET['deleteCat'];
    $query = $pdo->prepare("DELETE FROM tbl_category WHERE category_id = :cid");
    $query->bindParam("cid", $deleteCat);
?>
    <script>
        var x = confirm('Are you sure you want to delete this category?');
        if(x == true){ 
            <?php
               $query -> execute();
            ?>
            alert('Category successfully deleted');
            location.assign('viewcategory.php');
        }else{
            alert('Category deletion canceled');
        }
    </script>
<?php
}
// addProduct
    // Function to generate a unique 7-digit product ID
    function generateProductId(){
        $product_code = mt_rand(10,99);
        $product_number = mt_rand(10000,99999);
        return $product_code . $product_number;
    }
    if(isset($_POST["addProduct"])){
        // form 
        $proName = $_POST['proName'];
        $proPrice = $_POST['proPrice'];
        $proQuantity = $_POST['proQuantity'];
        $proDes = $_POST['proDes'];
        $proCatId = $_POST['proCatId'];
        $prostatus = $_POST['prostatus'];
        $proBrand = $_POST['proBrand'];
        $prodeal_of_the_week = $_POST['prodealoftheweek'];
    
        // unique Id
        $productId = generateProductId();
        // image uploading
        $proImageName = $_FILES['proImage']['name'];
        $proTmpName = $_FILES['proImage']['tmp_name'];
        $extension = pathinfo($proImageName,PATHINFO_EXTENSION);
        $designation = "img/products/".$proImageName;
        if($extension == "png" || $extension == "webp" || $extension == "jpeg" || $extension=="jpg"){
            if(move_uploaded_file($proTmpName, $designation)){
                $query = $pdo -> prepare("insert into tbl_products(product_id,product_name,product_price,product_quantity,product_detail,product_image,product_cat_id,product_status,product_brand,deal_of_the_week)values(:pid,:pn,:pp,:pq,:pd,:pimg,:pcid,:ps,:pb,:dotw)");
                $query -> bindParam("pid",$productId);
                $query -> bindParam("pn",$proName);
                $query -> bindParam("pp",$proPrice);
                $query -> bindParam("pq",$proQuantity);
                $query -> bindParam("pd", $proDes);
                $query -> bindParam("pimg",$proImageName);
                $query -> bindParam("pcid",$proCatId);
                $query -> bindParam("ps",$prostatus);
                $query -> bindParam("pb",$proBrand);
                $query -> bindParam("dotw",$prodeal_of_the_week);
                $_SESSION['productstatus'] = $prostatus;

                $query -> execute();
                echo "<script>
                alert('Product added successfully');
                location.assign('viewproduct.php');
                </script>";
            }
        }
    }
//update product
if(isset($_POST['UpdateProduct'])){
    $proId = $_POST['proId'];
    $proName = $_POST['proName'];
    $proBrand = $_POST['proBrand'];
    $proPrice = $_POST['proPrice'];
    $proQuantity = $_POST['proQuantity'];
    $proDes = $_POST['proDes'];
    $proCatId = $_POST['proCatId'];
    $prostatus = $_POST['prostatus'];
    $prodeal_of_the_week = $_POST['prodealoftheweek'];
    if(!empty($_FILES["proImage"]["name"])){
        $proImageName = $_FILES["proImage"]["name"];
        $proImageTmpName = $_FILES["proImage"]["tmp_name"];
        $extension = pathinfo($proImageName,PATHINFO_EXTENSION);
        $designation = "img/products/".$proImageName;
        if($extension=="jpg"||$extension=="jpeg"||$extension=="png"||$extension=="webp"){
           if(move_uploaded_file($proImageTmpName,$designation)){
               $query = $pdo -> prepare("update tbl_products set product_name =:pn,product_brand =:pb,product_price =:pp,product_quantity =:pq,product_detail =:pd,product_image =:pi,product_cat_id=:pcid,product_status =:ps,deal_of_the_week=:dotw where product_id =:pid");
               $query -> bindParam("pid",$proId);
               $query -> bindParam("pn",$proName);
               $query -> bindParam("pb",$proBrand);
               $query -> bindParam("pp",$proPrice);
               $query -> bindParam("pq",$proQuantity);
               $query -> bindParam("pd",$proDes);
               $query -> bindParam("pcid", $proCatId);
               $query -> bindParam("ps", $prostatus);
               $query -> bindParam("pi",$proImageName);
               $query -> bindParam("dotw",$prodeal_of_the_week);
               $query -> execute();
               echo "<script>
               alert('product successfully updated with image');
               location.assign('viewproduct.php');
               </script>";
            }else{
            echo "<script>
            alert('Not acceptable');
            </script>";
            }         
        }
    }else{
        $query = $pdo -> prepare("update tbl_products set product_name =:pn,product_brand =:pb,product_price =:pp,product_quantity =:pq,product_detail =:pd,product_cat_id=:pcid,product_status =:ps,deal_of_the_week=:dotw where product_id =:pid");
        $query -> bindParam("pid",$proId);
        $query -> bindParam("pn",$proName);
        $query -> bindParam("pb",$proBrand);
        $query -> bindParam("pp",$proPrice);
        $query -> bindParam("pq",$proQuantity);
        $query -> bindParam("pd",$proDes);
        $query -> bindParam("pcid", $proCatId);
        $query -> bindParam("ps", $prostatus);
        $query -> bindParam("dotw",$prodeal_of_the_week);
        $query -> execute();
        echo "<script>
        alert('product successfully updated without image');
        location.assign('viewproduct.php');
        </script>";
    }
} 
// delete product
if(isset($_GET['deleteProId'])){
    $deleteProId = $_GET["deleteProId"];
    $query = $pdo -> prepare("delete from products where product_id = :pid");
    $query -> bindParam("pid",$deleteProId);
    $query -> execute();
    echo "<script>
    alert('product deleted successfully');
    location.assign('viewproduct.php');
    </script>";
}
// addblog
if(isset($_POST["AddBlog"])){
    $BlogName = $_POST["BlogName"];
    $BlogDetail = $_POST["BlogDetail"];
    $BlogAuthor = $_POST["BlogAuthor"];
    $BlogImageName = $_FILES["BlogImage"]["name"];
    $BlogImageTmpName = $_FILES["BlogImage"]["tmp_name"];
    $extension = pathinfo($BlogImageName,PATHINFO_EXTENSION);
    $designation = "../dashmin/img/blog/".$BlogImageName;
    if($extension=="jpg"||$extension=="jpeg"||$extension=="png"||$extension=="webp"){
        if(move_uploaded_file($BlogImageTmpName,$designation)){
            $query = $pdo -> prepare("insert into tbl_blog(Blog_name,Blog_image,Blog_detail,Blog_author)values(:bn,:bi,:bd,:ba)");
            $query -> bindParam("bn",$BlogName);
            $query -> bindParam("bi",$BlogImageName);
            $query -> bindParam("bd",$BlogDetail);
            $query -> bindParam("ba",$BlogAuthor);
            $query -> execute();
            echo "<script>
            alert('Blog successfully added');
            location.assign('viewblog.php');
            </script>";
        }
    }else{
        echo "<script>
        alert('Not acceptable');
        </script>";
    }

}
// update blog

if(isset($_POST['UpdateBlog'])){
    $BlogId = $_POST['BlogId'];
    $BlogName = $_POST['BlogName'];
    $BlogDetail = $_POST["BlogDetail"];
    $BlogAuthor = $_POST["BlogAuthor"];
    // image uploading
    if(!empty($_FILES["BlogImage"]["name"])){
        $BlogImageName = $_FILES["BlogImage"]["name"];
        $BlogImageTmpName = $_FILES["BlogImage"]["tmp_name"];
        $extension = pathinfo($BlogImageName,PATHINFO_EXTENSION);
        $designation = "../dashmin/img/blog/".$BlogImageName;
        if($extension=="jpg"||$extension=="jpeg"||$extension=="png"||$extension=="webp"){
           if(move_uploaded_file($BlogImageTmpName,$designation)){
               $query = $pdo -> prepare("update tbl_blog set Blog_name =:bn, Blog_image =:bi, Blog_detail=:bd, Blog_author=:ba where Blog_id =:bid");
               $query -> bindParam("bn",$BlogName);
               $query -> bindParam("bi",$BlogImageName);
               $query -> bindParam("bd",$BlogDetail);
               $query -> bindParam("ba",$BlogAuthor);
               $query -> bindParam("bid",$BlogId);
               $query -> execute();
               echo "<script>
               alert('Blog successfully updated with image');
               location.assign('viewblog.php');
               </script>";
            }else{
            echo "<script>
            alert('Not acceptable');
            </script>";
            }         
        }
    }else{
        $query = $pdo -> prepare("update tbl_blog set Blog_name =:bn, Blog_detail=:bd, Blog_author=:ba where Blog_id =:bid");
        $query -> bindParam("bn",$BlogName);
        $query -> bindParam("bd",$BlogDetail);
        $query -> bindParam("ba",$BlogAuthor);
        $query -> bindParam("bid",$BlogId);
        $query -> execute();
        echo "<script>
        alert('Blog successfully updated without image');
        location.assign('viewblog.php');
        </script>";

    }
}
// delete blog
if(isset($_GET['deleteCat'])){
    $deleteCat = $_GET['deleteCat'];
    $query = $pdo->prepare("DELETE FROM tbl_blog WHERE Blog_id = :bid");
    $query->bindParam("bid", $deleteCat);
    $query -> execute();
    echo "<script>
    alert('blog deleted successfully');
    location.assign('viewblog.php');
    </script>";
}
// updateorder
if(isset($_POST['UpdateOrder'])){
    $productId = $_POST['proId'];
    $orderId = $_POST['orderid'];
    $proName = $_POST['proName'];
    $paymentstatus= $_POST['paymentstatus'];
    $dispatchstatus = $_POST['dispatchstatus'];
    $query = $pdo -> prepare("update tbl_order set payment_status=:ps, dispatch_status=:ds where order_id =:oid");
               $query -> bindParam("oid",$orderId);
               $query -> bindParam("ps",$paymentstatus);
               $query -> bindParam("ds",$dispatchstatus);
               $query -> execute(); 
               echo "<script>
               alert('Order updated successfully');
               location.assign('vieworder.php');
               </script>";           
             
}
// delete order
if(isset($_GET['deleteOrderId'])){
    $deleteOrderId = $_GET["deleteOrderId"];
    $query = $pdo -> prepare("delete from tbl_order where order_id =:oid");
    $query -> bindParam("oid",$deleteOrderId);
    $query -> execute();
    echo "<script>
    alert('Order deleted successfully');
    location.assign('vieworder.php');
    </script>";
}
?>