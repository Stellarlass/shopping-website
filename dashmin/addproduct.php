<?php
include("header.php");
// for restricting user from going to product pg through url
if(!isset($_SESSION["userEmail"])){
    echo "<script>
    alert('you need to login first');
    location.assign('signin.php');
    </script>";
}
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">ADD PRODUCT</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proName">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proBrand">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proPrice">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proQuantity">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Detail</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proDes">
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
                                        <option value="<?php echo $prData['category_id']?>"><?php echo $prData['category_name']?></option>
                                    <?php    
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="proImage">
                                </div>
                                <div class="form-floating mb-3">
                                 <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="prostatus">
                                    <option hidden>Product Status</option>
                                    <option value="new-arrivals">New Arrivals</option>
                                    <option value="hot-sales">Hot Sales</option>
                                   
                                 </select>
                                 <label for="floatingSelect">Select </label>
                                </div>
                                <div class="form-floating mb-3">
                                 <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="prodealoftheweek">
                                    <option hidden>Deal Of The Week</option>
                                    <option value="Deal-Of-The-Week">Deal Of The Week</option>
                                    <option value="None">None</option>
                                 </select>
                                 <label for="floatingSelect">Select </label>
                                </div>
                               
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                            </form>
        </div>
</div>
<!-- Blank End -->
  <?php   
    include("footer.php");
  ?>
