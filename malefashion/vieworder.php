<?php
include("header.php");
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>View Order</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>View Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<?php
    if(isset($_GET['mpId'])){
    $mpId = $_GET['mpId'];
    $query = $pdo -> prepare("select * from tbl_order where user_id = :pid");
    $query -> bindParam("pid",$mpId);
    $query -> execute();
    $orderrow = $query -> fetchAll(PDO::FETCH_ASSOC);
    foreach($orderrow as $row){
        ?>
        <div class="container-fluid mt-5">
      <div class="bg-light rounded h-100 p-4">
        <div class="row">
          <div class="col-md-9">
             <h6 class="mb-4">Your Order</h6>
             <form action="" method="post">
             <div class="mb-3">
                <label for="id" class="form-label">Order Date</label>
                <input type="text" class="form-control" id="id" name="ProfileId" value="<?php echo $row['order_date'];?>" readonly>
               </div>
               <div class="mb-3">
                <label for="id" class="form-label">Order Id</label>
                <input type="text" class="form-control" id="id" name="OrderId" value="<?php echo $row['order_id'];?>" readonly>
               </div>
               <div class="mb-3">
                <label for="username" class="form-label">Order Number</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['order_number'];?>" readonly>
               </div>
               <div class="mb-3">
                <label for="role" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['product_name']; ?>" readonly>
               </div>
               <div class="mb-3">
                <label for="role" class="form-label">Total Amount</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['product_price']*$row['product_quantity']; ?>" readonly>
               </div>
               <div class="mb-3">
                <label for="email" class="form-label">Order Status</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['dispatch_status']; ?>" readonly>
               </div>
               <?php 
               $dispatchstatus = $row['dispatch_status'];
               if($dispatchstatus == "Dispatched"){
                 ?>
                 <div class="col-lg-6" >
                  <div class="mb-3" id="hidediv">
                     <button type="submit" class="btn btn-danger" name="ReturnOrder" value="ReturnRequested">Return Order</button>
                     <button type="submit" class="btn btn-danger" name="ReplaceOrder" value="ReplacementRequested">Replace Order</button>
                  </div>
                 </div>
               <?php
               } 
               ?>
             </form>
          </div>
        </div> 
      </div>
    </div>
    <?php    
    }
    ?>
    
    <?php
}
include("footer.php");
?>
