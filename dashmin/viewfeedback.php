<?php
include("header.php");
if(!isset($_SESSION["userEmail"])){
    echo "<script>
    alert('you need to login first');
    location.assign('../malefashion/login.php');
    </script>";
}
?>
<div class="container mt-5">
        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Feedback</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Feedback</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Ratings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $pdo -> query("select * from tbl_feedback");
                                        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row as $catAll){
                                            ?>
                                             <tr>
                                               <td><?php echo $catAll['user_id']?></td>
                                               <td>
                                                  <?php echo $catAll['order_number']?>
                                               </td>
                                               <td>
                                                   <?php echo $catAll['feedback']?>       
                                               </td>
                                               <td>
                                                  <?php echo $catAll['product_name']?>
                                               </td>
                                               <td>
                                                  <?php echo $catAll['Ratings']?>
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
<?php
include("footer.php");
?>
