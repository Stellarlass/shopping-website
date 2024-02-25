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
    $query = $pdo -> prepare("select * from tbl_blog where Blog_id = :bid");
    $query -> bindParam("bid",$catId);
    $query -> execute();
    $catData = $query -> fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">UPDATE BLOG</h6>
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="BlogId" value="<?php echo $catData['Blog_id']?>">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="BlogName" value="<?php echo $catData['Blog_name']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="BlogImage">
                                    <img src="../dashmin/img/blog/<?php echo $catData['Blog_image']?>" alt="" width="80">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Detail</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="BlogDetail" value="<?php echo $catData['Blog_detail']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Author</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="BlogAuthor" value="<?php echo $catData['Blog_author']?>">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="UpdateBlog">Update Blog</button>
                            </form>
        </div>
</div>
<!-- Blank End -->
  <?php   
    include("footer.php");
  ?>
