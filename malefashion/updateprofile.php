<?php
include("header.php");
if(isset($_GET['ProfileId'])){
    $ProfileId = $_GET['ProfileId'];
    $query = $pdo -> prepare("select * from tbl_role where Id = :pid");
    $query -> bindParam("pid",$ProfileId);
    $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);
}
?>
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                  <form action="" method="post">  
                  <input type="hidden" name="proId" id="" value="<?php echo $row['Id']?>">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Update</h3>
                        </div>
                
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?php echo $row['Password']?>">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Profilepassword">
                            <label for="floatingPassword">New Password</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="Update">Update</button>
                        <p class="text-center mb-0">Return to profile<a href="myprofile.php"> <i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
                    </div>
                  </form>  
                </div>
            </div>
        </div>
<?php
include("footer.php");
?>