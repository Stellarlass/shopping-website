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
                            <h6 class="mb-4">View Blog</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Blog Name</th>
                                            <th scope="col">Blog Image</th>
                                            <th scope="col">Blog Detail</th>
                                            <th scope="col">Blog Author</th>
                                            <th scope="col" colspan="2">Action</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $pdo -> query("select * from tbl_blog");
                                        $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row as $catAll){
                                            ?>
                                             <tr>
                                               <th scope="row"><?php echo $catAll['Blog_id']?></th>
                                               <td><?php echo $catAll['Blog_name']?></td>
                                               <td>
                                                  <img src="img/blog/<?php echo $catAll['Blog_image']?>" alt="" width="80">
                                               </td>
                                               <td><?php echo $catAll['Blog_detail']?></td>
                                               <td><?php echo $catAll['Blog_author']?></td>
                                               <td>
                                                   <a href="updateblog.php?catId=<?php echo $catAll['Blog_id'] ?>" class="btn btn-primary">Edit</a>       
                                               </td>
                                               <td>
                                               <a href="?deleteCat=<?php echo $catAll['Blog_id'] ?>" class="btn btn-danger">Delete</a>
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
