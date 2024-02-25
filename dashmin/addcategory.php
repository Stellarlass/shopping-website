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
                            <h6 class="mb-4">ADD CATEGORY</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="catName">
                                        <option hidden>Category Name</option>
                                        <option value="Gift articles & Greeting Cards">Gift articles & Greeting Cards</option>
                                        <option value="Artistic Essentials">Artistic Essentials</option>
                                        <option value="Wallets & Purses">Wallets & Purses</option>
                                        <option value="Stationary items & toys">Stationary items & toys</option>
                                        <option value="Beauty Collection">Beauty Collection</option> 
                                    </select>
                                    <label for="floatingSelect">Select </label>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Category Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="catImage">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="AddCategory">Add Category</button>
                            </form>
        </div>
</div>
<!-- Blank End -->
  <?php   
    include("footer.php");
  ?>
