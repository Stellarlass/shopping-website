<?php
include("header.php");
// for restricting user from going to index pg through url
if(!isset($_SESSION["userEmail"])){
    echo "<script>
    alert('you need to login first');
    location.assign('../malefashion/login.php');
    </script>";
}
if($_SESSION["userRole"]=="admin"){
    ?>
            <div class="container-fluid pt-4 px-4">
                
               
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex mb-4">
                               
                            <h1 class="mb-0 text-capitalize">Admin Dashboard</h1>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                               
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                
                                
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->
            <?php
}elseif($_SESSION["userRole"]=="dealer/employee"){
  
    ?>
            <div class="container-fluid pt-4 px-4">
                
               
                </div>
                <div class="container-fluid pt-4 px-4">
                    <div class="row">
                        
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light text-center rounded p-4">
                                <div class="d-flex mb-4">
                                   
                                <h1 class="mb-0 text-capitalize">Employee Dashboard</h1>
                                </div>
                                <canvas id="salse-revenue"></canvas>
                            </div>
                            <div class="bg-light text-center rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                   
                                </div>
                                <canvas id="salse-revenue"></canvas>
                            </div>
                            <div class="bg-light text-center rounded p-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    
                                    
                                </div>
                                <canvas id="salse-revenue"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
}else {
    ?>
            <div class="container-fluid pt-4 px-4">
                <h1 class="mb-0 text-capitalize">Customer Dashboard</h1>
            </div>
            <?php
}
?>
<?php
include("footer.php");
?>

           