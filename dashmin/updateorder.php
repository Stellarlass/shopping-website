<?php
include("header.php");
// for restricting user from going to product pg through url
if(!isset($_SESSION["userEmail"])){
    echo "<script>
    alert('you need to login first');
    location.assign('../malefashion/login.php');
    </script>";
}
// to get id through url
if(isset($_GET['orderId'])){
    $orderId = $_GET['orderId'];
    $query = $pdo -> prepare('select * from tbl_order where order_id = :oid');
    $query -> bindParam("oid",$orderId);
    $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);
}

?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">UPDATE ORDER STATUS</h6>
                            <form method="post">
                                <input type="hidden" name="proId" value="<?php echo $row['product_id']?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proName" value="<?php echo $row['product_name']?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Order Id</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="orderid" value="<?php echo $row['order_id']?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Payment Status</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="paymentstatus" value="<?php echo $row['payment_status']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Dispatch status</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="dispatchstatus" value="<?php echo $row['dispatch_status']?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="UpdateOrder">Update Order</button>
                            </form>
        </div>
</div>
<!-- Blank End -->
  <?php   
    include("footer.php");
  ?>
