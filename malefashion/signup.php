<?php
include("header.php");
?>
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Sign Up</h4>
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
                                  <input class="input100" type="text" name="uname" placeholder="Enter username" required>
                                </div>
                                <div class="col-lg-6">
                                   <input class="input100" type="email" name="uemail" placeholder="Enter Email" required>
                                </div>
                                <div class="col-lg-6">
                                   <input class="input100" type="password" name="upassword"  placeholder="Enter password" required>
                                </div>
                                <div class="col-lg-6">
                                   <select class="input100" name="uselect" required>
                                      <option value="" disabled selected hidden>Select Role Type</option>
                                      <option value="dealer/employee">Dealer/Employee</option>
                                      <option value="customer">Customer</option>
                                   </select>
                                </div>
                                <div class="col-lg-12">
                                    
                                    <button type="submit" class="site-btn" name="SignUp">Sign Up</button>
                                    <br><span class="txt1"><br>Already have an account?</span>
							        <a href="login.php" class="txt1">
                                     Sign In<i class="fa fa-thin fa-arrow-right"></i>
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