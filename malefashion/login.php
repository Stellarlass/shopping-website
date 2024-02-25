<?php
include("header.php");
if(isset($_GET['AcceptId'])){
    $Accept = "accept";
    $AcceptId = $_GET['AcceptId'];
    $query = $pdo -> prepare("update tbl_role set status = :ps where Id = :accid");
    $query -> bindParam("accid",$AcceptId);
    $query -> bindParam("ps",$Accept);
    $query -> execute();
}elseif(isset($_GET['RejectId'])){
    $Reject = "reject";
    $RejectId = $_GET['RejectId'];
    $query = $pdo -> prepare("update tbl_role set status = :ps where Id = :accid");
    $query -> bindParam("accid",$RejectId);
    $query -> bindParam("ps",$Reject);
    $query -> execute();
}
?>
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Log In</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Log In</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__pic">
                        <img src="../dashmin/login-form/Login_v15/images/bg-01.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 mx-auto text-center">
                    <div class="contact__form">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Your Email Address" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" name="password" placeholder="Your Password" required>
                                </div>
                                <div class="col-lg-12">
                                    
                                    <button type="submit" class="site-btn" name="logIn">Log In</button>
                                    <br>
                                    <span class="txt1"><br>Don't have an account?</span>
							        <a href="signup.php" class="txt1">
                                     Sign Up<i class="fa fa-thin fa-arrow-right"></i>
							        </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>     
<?php
include("footer.php");
?>