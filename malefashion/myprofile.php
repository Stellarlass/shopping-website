<?php
include("header.php");
if(isset($_GET['mpId'])){
    $mpId = $_GET['mpId'];
    $query = $pdo -> prepare("select * from tbl_role where Id = :pid");
    $query -> bindParam("pid",$mpId);
    $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="container mt-5">
      <div class="bg-light rounded h-100 p-4">
        <div class="row">
          <div class="col-md-9">
             <h6 class="mb-4">Your Profile</h6>
             <form action="updateprofile.php" method="get">
               <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="ProfileId" value="<?php echo $row['Id']; ?>" readonly>
               </div>
               <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['UserName']; ?>" readonly>
               </div>
               <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>" readonly>
               </div>
               <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['Role']; ?>" readonly>
               </div>
               <div class="mb-3">
                <button type="submit" class="btn btn-primary">Change Password</button>
               </div>
             </form>
          </div>
                <?php
                if(!empty($_SESSION['userDp'])){
                ?>
                  <div class="col-md-3 mt-5">
                    <div class="position-relative"> 
                     <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px; border: 2px solid #ddd;">
                         <img src="../dashmin/img/displayprofile/<?php echo $_SESSION["userDp"]?>" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                     </div>
                     <a href="editprofilepicture.php?mpId=<?php echo $_SESSION['userId']?>" class="position-absolute bg-primary text-light p-1 rounded-circle" style="bottom: 0px; left: 5px; text-decoration: none;">Edit</a>
                    </div>
                  </div>
                <?php        
                }
                else{
                ?>
                  <div class="col-md-3 mt-5">
                    <div class="position-relative"> 
                     <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px; border: 2px solid #ddd;">
                        <img src="../dashmin/img/user1.jpg" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                     </div>
                     <a href="editprofilepicture.php?mpId=<?php echo $_SESSION['userId']?>" class="position-absolute bg-primary text-light p-1 rounded-circle" style="bottom: 0px; left: 5px; text-decoration: none;">Edit</a>
                   </div>            
                  </div>
                <?php
                }
                ?> 
        </div> 
      </div>
    </div>
    <?php
}else{
    ?>
    <div class="container mt-5">
      <div class="bg-light rounded h-100 p-4">
        <div class="row">
          <div class="col-md-9">
             <h6 class="mb-4">Your Profile</h6>
             <form action="updateprofile.php" method="get">
        
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="ProfileId" value="<?php echo $_SESSION['userId']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['userName']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['userEmail']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $_SESSION['userRole']; ?>" readonly>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
             </form>
          </div>
          <?php  
             if(!empty($_SESSION['userDp'])){
            ?>
                <div class="col-md-3 mt-5">
                  <div class="position-relative"> 
                     <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px; border: 2px solid #ddd;">
                         <img src="../dashmin/img/displayprofile/<?php echo $_SESSION["userDp"]?>" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                     </div>
                     <a href="editprofilepicture.php?mpId=<?php echo $_SESSION['userId']?>" class="position-absolute bg-primary text-light p-1 rounded-circle" style="bottom: 0px; left: 5px; text-decoration: none;">Edit</a>
                  </div>
                </div>
            <?php        
             }
             else{
             ?>
             <div class="col-md-3 mt-5">
                  <div class="position-relative"> 
                     <div class="rounded-circle overflow-hidden" style="width: 100px; height: 100px; border: 2px solid #ddd;">
                        <img src="../dashmin/img/user1.jpg" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                     </div>
                     <a href="editprofilepicture.php?mpId=<?php echo $_SESSION['userId']?>" class="position-absolute bg-primary text-light p-1 rounded-circle" style="bottom: 0px; left: 5px; text-decoration: none;">Edit</a>
                   </div>            
             </div>
            <?php
            }
            ?>        
        </div> 
      </div>
    </div>
    <?php
}
    ?>
<?php 
include("footer.php");
?>
