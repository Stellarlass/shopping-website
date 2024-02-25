<?php
include("header.php");
// for restricting user from going to index pg through url
if(!isset($_SESSION["userEmail"])){
    echo "<script>
    alert('you need to login first');
    location.assign('../malefashion/login.php');
    </script>";
}
if(isset($_GET['catId'])){
    $catId = $_GET['catId'];
    $query = $pdo -> prepare("select * from tbl_category where category_id = :cid");
    $query -> bindParam("cid",$catId);
    $query -> execute();
    $catData = $query -> fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">UPDATE CATEGORY</h6>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="catId" value="<?php echo $catData['category_id']?>">
                            <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="catName" value="<?php echo $catData['category_name']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Category Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="catImage">
                                    <img src="img/category/<?php echo $catData['category_image']?>" alt="" width="80">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="UpdateCategory">Update Category</button>
                            </form>
        </div>
</div>
<!-- Blank End -->
  <?php   
    include("footer.php");
  ?>
