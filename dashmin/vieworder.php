<?php
include("header.php");
if(!isset($_SESSION["userEmail"])){
    echo "<script>
    alert('you need to login first');
    location.assign('../malefashion/login.php');
    </script>";
}
?>
<script>
    document.getElementById("hidesearch").style.display= "block";
    document.querySelector("#hidesearch input[name='catsearch']").placeholder = "Search by Order Id";
</script>
<div class="container mt-5" id="searchresult">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Order</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">User Id</th>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Quantity</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">User Phone</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">User Address</th>
                                            <th scope="col">User Country</th>
                                            <th scope="col">User City</th>
                                            <th scope="col">User Postal Code</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Delivery Type</th>
                                            <th scope="col">Payment Type</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Dispatch Status</th>
                                            <th scope="col">Return Requested</th>
                                            <th scope="col">Replacement Requested</th>
                                            <th scope="col">Return Date</th>
                                            <th scope="col">Order Instructions</th>
                                            <th scope="col" colspan="2">Action</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $pdo -> query("select * from tbl_order");
                                        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row as $proData){
                                            ?>
                                            <tr>
                                               <th scope="row"><?php echo $proData['order_id']?></th>
                                               <td><?php echo $proData['user_id']?></td>
                                               <td><?php echo $proData['order_number']?></td>
                                               <td><?php echo $proData['product_id']?></td>
                                               <td><?php echo $proData['product_name']?></td>
                                               <td><?php echo $proData['product_price']?></td>
                                               <td><?php echo $proData['product_quantity']?></td>
                                               <td><?php echo $proData['user_name']?></td>
                                               <td><?php echo $proData['user_phone']?></td>
                                               <td><?php echo $proData['user_email']?></td>
                                               <td><?php echo $proData['user_address']?></td>
                                               <td><?php echo $proData['user_country']?></td>
                                               <td><?php echo $proData['user_city']?></td>
                                               <td><?php echo $proData['user_postalcode']?></td>
                                               <td><?php echo $proData['order_date']?></td>
                                               <td><?php echo $proData['delivery_Type']?></td>
                                               <td><?php echo $proData['payment_type']?></td>
                                               <td><?php echo $proData['payment_status']?></td>
                                               <td><?php echo $proData['dispatch_status']?></td>
                                               <td><?php echo $proData['return_requested']?></td>
                                               <td><?php echo $proData['replacement_requested']?></td>
                                               <td><?php echo $proData['return_date']?></td>
                                               <td><?php echo $proData['order_instructions']?></td>
                                               <td>
                                                   <a href="updateorder.php?orderId=<?php echo $proData['order_id']?>" class="btn btn-primary">Edit</a>       
                                               </td>
                                               <td>
                                               <a href="?deleteOrderId=<?php echo $proData['order_id']?>" class="btn btn-danger">Delete</a>
                                               </td>
                                            </tr>
                                        <?php    
                                        }
                                        ?>    
                                    </tbody>
                                </table>
                            </div>
        </div>
</div>
<!-- search filter start-->
<?Php
if(isset($_POST['catsearchbtn'])){
    ?>
    <div class="container mt-5">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Order</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">User Id</th>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Quantity</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">User Phone</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">User Address</th>
                                            <th scope="col">User Country</th>
                                            <th scope="col">User City</th>
                                            <th scope="col">User Postal Code</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Delivery Type</th>
                                            <th scope="col">Payment Type</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Dispatch Status</th>
                                            <th scope="col">Return Requested</th>
                                            <th scope="col">Replacement Requested</th>
                                            <th scope="col">Return Date</th>
                                            <th scope="col">Order Instructions</th>
                                            <th scope="col" colspan="2">Action</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $catsearch = $_POST['catsearch'];
                                        $query = $pdo -> prepare("select * from tbl_order where order_id = :oid");
                                        $query -> bindParam("oid",$catsearch);
                                        $query -> execute();
                                        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row as $proData){
                                            ?>
                                            <tr>
                                               <th scope="row"><?php echo $proData['order_id']?></th>
                                               <td><?php echo $proData['user_id']?></td>
                                               <td><?php echo $proData['order_number']?></td>
                                               <td><?php echo $proData['product_id']?></td>
                                               <td><?php echo $proData['product_name']?></td>
                                               <td><?php echo $proData['product_price']?></td>
                                               <td><?php echo $proData['product_quantity']?></td>
                                               <td><?php echo $proData['user_name']?></td>
                                               <td><?php echo $proData['user_phone']?></td>
                                               <td><?php echo $proData['user_email']?></td>
                                               <td><?php echo $proData['user_address']?></td>
                                               <td><?php echo $proData['user_country']?></td>
                                               <td><?php echo $proData['user_city']?></td>
                                               <td><?php echo $proData['user_postalcode']?></td>
                                               <td><?php echo $proData['order_date']?></td>
                                               <td><?php echo $proData['delivery_Type']?></td>
                                               <td><?php echo $proData['payment_type']?></td>
                                               <td><?php echo $proData['payment_status']?></td>
                                               <td><?php echo $proData['dispatch_status']?></td>
                                               <td><?php echo $proData['return_requested']?></td>
                                               <td><?php echo $proData['replacement_requested']?></td>
                                               <td><?php echo $proData['return_date']?></td>
                                               <td><?php echo $proData['order_instructions']?></td>
                                               <td>
                                                   <a href="updateorder.php?orderId=<?php echo $proData['order_id']?>" class="btn btn-primary">Edit</a>       
                                               </td>
                                               <td>
                                               <a href="?deleteOrderId=<?php echo $proData['order_id']?>" class="btn btn-danger">Delete</a>
                                               </td>
                                            </tr>
                                        <?php    
                                        }
                                        ?>    
                                    </tbody>
                                </table>
                            </div>
        </div>
    </div>
<script>
   alert('Searched match');
   document.getElementById("searchresult").style.display = 'none';
 </script>
<?php    
}
?>
<?php
include("footer.php");
?>