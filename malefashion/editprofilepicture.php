<?php
include("header.php");
if(isset($_GET['mpId'])){
    $mpId = $_GET['mpId'];
    $query = $pdo -> prepare("select * from tbl_role where Id = :pid");
    $query -> bindParam("pid",$mpId);
    $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container-fluid pt-4 px-4">
  <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">DISPLAY PROFILE PICTURE</h6>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="dpimgid" value="<?php echo $row['Id']?>">
        
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Insert an Image</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="dpImage" value="<?php echo $row['Dp']?>">
            </div>
            
            <button type="submit" class="btn btn-primary" name="Updatedisplay">Update display</button>
        </form>
  </div> 
</div>
<?php
include("footer.php");
?>