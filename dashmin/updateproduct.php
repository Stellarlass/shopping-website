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
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $query = $pdo -> prepare('select * from tbl_products where product_id = :pid');
    $query -> bindParam("pid",$productId);
    $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);
}

?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">UPDATE PRODUCT</h6>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="proId" value="<?php echo $row['product_id']?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proName" value="<?php echo $row['product_name']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proBrand" value="<?php echo $row['product_brand']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proPrice" value="<?php echo $row['product_price']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proQuantity" value="<?php echo $row['product_quantity']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Detail</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proDes" value="<?php echo $row['product_detail']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Category Type</label>
                                    <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="proCatId">
                                    <option hidden>Select Category</option>
                                    <?php
                                    $query = $pdo -> query("select * from tbl_category");
                                    $data = $query -> fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $prData){
                                        ?>
                                        <option value="<?php echo $prData['category_id']?>"<?= $row ['product_cat_id']== $prData['category_id'] ?'selected':''?>><?php echo $prData['category_name']?></option>
                                    <?php    
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="proImage">
                                    <img src="img/products/<?php echo $row['product_image']?>" alt="" width="90">
                                </div>
                                <div class="form-floating mb-3">
                                 <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="prostatus">
                                    <option hidden>Product Status</option>
                                    <?php
                                    $query = $pdo -> query("select * from tbl_products"); 
                                    $data = $query -> fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $prData){
                                        ?>
                                        <option value="<?php echo $prData['product_status']?>"<?= $row ['product_status']== $prData['product_status'] ?'selected':''?>><?php echo $prData['product_status']?></option>
                                    <?php    
                                    }
                                    ?>
                                 </select>
                                 <label for="floatingSelect">Select </label>
                                </div>
                                <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="prodealoftheweek">
                                    <option hidden>Deal Of The Week</option>
                                    <?php
                                    $query = $pdo -> query("select distinct deal_of_the_week from tbl_products"); 
                                    $data = $query -> fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $prData){
                                        ?>
                                        <option value="<?php echo $prData['deal_of_the_week']?>"<?= $row ['deal_of_the_week']== $prData['deal_of_the_week'] ?'selected':''?>><?php echo $prData['deal_of_the_week']?></option>
                                    <?php    
                                    }
                                    ?>
                                 </select>
                                 <label for="floatingSelect">Deal_of_the_week</label>
                                </div>
                               
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="UpdateProduct">Update Product</button>
                            </form>
        </div>
</div>
<!-- Blank End -->
  <?php   
    include("footer.php");
  ?>
