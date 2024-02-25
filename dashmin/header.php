<?php
include("php/query.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="../malefashion/index.php" class="navbar-brand mx-4 mb-3">
                    <h6 class="text-primary"><i class="fa fa-hashtag me-2"></i>ARTEM SERENITY</h6>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <?php
                    if(!empty($_SESSION['userDp'])){
                        ?>
                            <div class="position-relative">       
                                <img src="img/displayprofile/<?php echo $_SESSION["userDp"]?>" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px;">
                                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                            </div>
                        <?php        
                    }
                    else{
                        ?>
                            <div class="position-relative">
                                <img src="img/user1.jpg" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px;">
                            </div>
                    <?php
                    }
                    ?>  
                    <?php
                    if(isset($_SESSION["userEmail"])){
                        ?>
                        <div class="ms-3">
                           <h6 class="mb-0"><?php echo $_SESSION["userName"]?></h6>
                           <span><?php echo $_SESSION["userRole"]?></span>
                        </div>
                    <?php    
                    }
                    ?>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                  <?php
                    if($_SESSION["userRole"]== "admin"){
                        ?>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Category</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="addcategory.php" class="dropdown-item">Add Category</a>
                            <a href="viewcategory.php" class="dropdown-item">View Category</a>
                        </div>
                      </div>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="addproduct.php" class="dropdown-item">Add Product</a>
                            <a href="viewproduct.php" class="dropdown-item">View Product</a>
                        </div>
                      </div>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Blogs</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="addblog.php" class="dropdown-item">Add Blog</a>
                            <a href="viewblog.php" class="dropdown-item">View Blog</a>
                        </div>
                      </div>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Orders</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="vieworder.php" class="dropdown-item">Order Details</a>
                        </div>
                      </div>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Feedback</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="viewfeedback.php" class="dropdown-item">Feedback Details</a>
                        </div>
                      </div>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Employees</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="employee.php" 
                            class="dropdown-item">Employee details</a>
                        </div>
                      </div>
                        <?php
                    }elseif($_SESSION["userRole"]== "dealer/employee"){
                        ?>
                        <div class="nav-item dropdown">
                           <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Orders</a>
                           <div class="dropdown-menu bg-transparent border-0">
                              <a href="vieworder.php" class="dropdown-item">Order Details</a>
                           </div>
                        </div>
                        <?php
                    }
                  ?>  
                    <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                </div> -->
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div id="hidesearch" style="display: none;">
                <form class="d-none d-md-flex ms-4" method="post">
                    <input class="form-control border-0" type="search" placeholder="Search" name="catsearch">
                    <button type="submit" class="btn btn-primary" name="catsearchbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                </div>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="../malefashion/index.php">
                            <i class="fa fa-laptop me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Open Website</span>
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                           <?php
                           if(!empty($_SESSION['userDp'])){
                            ?>
                                <img src="img/displayprofile/<?php echo $_SESSION["userDp"]?>" alt="Profile Picture" class="rounded-circle me-lg-2" style="width: 40px; height: 40px;">          
                            <?php        
                            }
                            else{
                            ?>                   
                                <img src="img/user1.jpg" alt="Profile Picture" class="rounded-circle me-lg-2" style="width: 40px; height: 40px;"> 
                            <?php
                            }
                            ?>
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION["userName"]?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="myprofile.php?mpId=<?php echo $_SESSION['userId']?>" class="dropdown-item">My Profile</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

