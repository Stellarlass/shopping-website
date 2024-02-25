<?php
include("header.php");
// for restricting user from going to category pg through url
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
                            <h6 class="mb-4">ADD BLOG</h6>
                            <form method="post" enctype="multipart/form-data">
                               <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="BlogName">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="BlogImage">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Detail</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="BlogDetail">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Author</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="BlogAuthor">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="AddBlog">Add Blog</button>
                            </form>
        </div>
</div>
<!-- Blank End -->
  <?php   
    include("footer.php");
  ?>
