<?php
include("header.php");
?>
<div class="container mt-5">
    <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Employee Details</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $role = "dealer/employee";
                                                $query = $pdo -> prepare("select * from tbl_role where role = :pr");
                                                $query -> bindParam("pr",$role);
                                                $query -> execute();
                                                $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                                foreach($row as $employeedetails){
                                                    ?>
                                                    <tr>
                                                       <th scope="row"><?php echo $employeedetails['Id']?></th>
                                                       <td><?php echo $employeedetails['UserName']?></td>
                                                       <td><?php echo $employeedetails['Email']?></td>
                                                       <td><?php echo $employeedetails['Password']?></td>
                                                       <td><?php echo $employeedetails['Role']?></td>
                                                       <form action="" method="post">
                                                         <td>
                                                          <a href="../malefashion/login.php?AcceptId=<?php echo $employeedetails['Id']?>" class="btn btn-primary">Accept</a>
                                                           
                                                         <td>
                                                         <a href="../malefashion/login.php?RejectId=<?php echo $employeedetails['Id']?>" class="btn btn-primary">Reject</a>
                                                         </td>
                                                      </form>
                                        
                                                    </tr>
                                                   <?php    
                                                  }
                                            
                                        ?>
                                        
                                    </tbody>
                                </table>
    </div>
</div>



<?php
include("footer.php");
?>