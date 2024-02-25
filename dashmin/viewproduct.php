<?php
include("header.php");
if(!isset($_SESSION["userEmail"])){
    echo "<script>
    alert('you need to login first');
    location.assign('../malefashion/login.php');
    </script>";
}
?>
<script>
    document.getElementById("hidesearch").style.display= "block";
    document.querySelector("#hidesearch input[name='catsearch']").placeholder = "Search by Category";
</script>
<div class="container mt-5"  id="searchresult">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Products</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Brand</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Quantity</th>
                                            <th scope="col">Product Detail</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Category Name</th>
                                            <th scope="col">Product Status</th>
                                            <th scope="col">Deal Status</th>
                                            
                                            <th scope="col" colspan="2">Action</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $pdo -> query("SELECT `tbl_products`.*, `tbl_category`.`category_name`
                                        FROM `tbl_products` 
                                            INNER JOIN `tbl_category` ON `tbl_products`.`product_cat_id` = `tbl_category`.`category_id`");
                                        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row as $proData){
                                            ?>
                                            <tr>
                                               <th scope="row"><?php echo $proData['product_id']?></th>
                                               <td><?php echo $proData['product_name']?></td>
                                               <td><?php echo $proData['product_brand']?></td>
                                               <td><?php echo $proData['product_price']?></td>
                                               <td><?php echo $proData['product_quantity']?></td>
                                               <td><?php echo $proData['product_detail']?></td>
                                               <td>
                                                  <img src="img/products/<?php echo $proData['product_image']?>" alt="" width="80">
                                               </td>
                                               <td><?php echo $proData['category_name']?></td>
                                               <td><?php echo $proData['product_status']?></td>
                                               <td><?php echo $proData['deal_of_the_week']?></td>
                                               <td>
                                                   <a href="updateproduct.php?productId=<?php echo $proData['product_id']?>" class="btn btn-primary">Edit</a>       
                                               </td>
                                               <td>
                                               <a href="?deleteProId=<?php echo $proData['product_id']?>" class="btn btn-danger">Delete</a>
                                               </td>
                                            </tr>

                                        <?php    
                                        }
                                        ?>
                                            
                                    </tbody>
                                </table>
                            </div>
        </div>
</div>
<!-- search filter start-->
<?Php
if(isset($_POST['catsearchbtn'])){
    ?>
    <div class="container mt-5">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Products</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Brand</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Quantity</th>
                                            <th scope="col">Product Detail</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Category Name</th>
                                            <th scope="col">Product Status</th>
                                            <th scope="col">Deal Status</th>
                                            
                                            <th scope="col" colspan="2">Action</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $catsearch = $_POST['catsearch'];
                                        $query = $pdo -> prepare("SELECT `tbl_products`.*, `tbl_category`.`category_name`
                                        FROM `tbl_products` 
                                            INNER JOIN `tbl_category` ON `tbl_products`.`product_cat_id` = `tbl_category`.`category_id` where category_name = :cn");
                                        $query -> bindParam("cn",$catsearch);
                                        $query -> execute();    
                                        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row as $proData){
                                            ?>
                                            <tr>
                                               <th scope="row"><?php echo $proData['product_id']?></th>
                                               <td><?php echo $proData['product_name']?></td>
                                               <td><?php echo $proData['product_brand']?></td>
                                               <td><?php echo $proData['product_price']?></td>
                                               <td><?php echo $proData['product_quantity']?></td>
                                               <td><?php echo $proData['product_detail']?></td>
                                               <td>
                                                  <img src="img/products/<?php echo $proData['product_image']?>" alt="" width="80">
                                               </td>
                                               <td><?php echo $proData['category_name']?></td>
                                               <td><?php echo $proData['product_status']?></td>
                                               <td><?php echo $proData['deal_of_the_week']?></td>
                                               <td>
                                                   <a href="updateproduct.php?productId=<?php echo $proData['product_id']?>" class="btn btn-primary">Edit</a>       
                                               </td>
                                               <td>
                                               <a href="?deleteProId=<?php echo $proData['product_id']?>" class="btn btn-danger">Delete</a>
                                               </td>
                                            </tr>

                                        <?php    
                                        }
                                        ?>    
                                    </tbody>
                                </table>
                            </div>
        </div>
    </div>
<script>
   alert('Searched match');
   document.getElementById("searchresult").style.display = 'none';
 </script>
<?php    
}
?>
<?php
include("footer.php");
?>