<?php
include('../components/header_organizer.php');
include('../config/dbcon.php');

?>


<?php
if(!isset($_SESSION['admin_id']))
{
    echo '<script>
                                    swal({
                                        title: "Error",
                                        text: "You must login first before you proceed!",
                                        icon: "error"
                                    }).then(function() {
                                        window.location = "admin_login.php";
                                    });
                                </script>';
                                exit;
}

?>


		<!-- MAIN -->
		<main>
			<h1 class="title">Manage Organizer</h1>
			<ul class="breadcrumbs">
				<li><a href="#">User</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Organizer</a></li>
			</ul>

            <div class="container mt-3 table-border">
            <a href="add_organizer.php" class="btn btn-success btn-sm">Create</a>
                <table class="table table-hover" id="admin_table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Id no</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Acc Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //query to get all data from tbl_admin database
                $sql = "SELECT * FROM tbl_organizer";

                //execute the query
                $result = mysqli_query($conn,$sql);

                //check whether if the query is execute or not

                if($result==True)
                {
                    //count the rows to check we have data in database or not
                    $count = mysqli_num_rows($result);

                    $ids=1;

                    //check the num of rows
                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($result))
                        {
                            $id = $rows['id'];
                            $id_no = $rows['id_no'];
                            $email = $rows['email'];
                            $name = $rows['name'];
                            $organization = $rows['organization'];
                            $username = $rows['username'];
                            $role = $rows['role'];
                            $image = $rows['image'];
                            $status = $rows['acc_status'];
                            
                            

                            ?>
                        <tr>
                        <td><?php echo $ids++;?></td>
                            <td><?php echo $id_no;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $organization;?></td>
                            <td><?php echo $username;?></td>
                            <td><?php echo $role;?></td>
                            <td><img src="organizer_image/<?php echo $image?>" style="width: 70px;"></td>
                            <td><?php echo $status;?></td>
                            
                            <td>
                                <a href="update_organizer.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm">Update</a>
                                <form action="code.php" method="post">
                                    <button type="button"  class="btn-del delete_organizerbtn" value="<?= $id;?>">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        <!-- More rows can be added here -->
                        <?php

                        }
                    }
                    
                }

                ?>
                    </tbody>
                </table>
            </div>
			

			
		</main>


        <style>
            .table-border {
                border: 2px solid #dee2e6; /* Bootstrap's default border color */
                padding: 10px;
                border-radius: 5px; /* Optional: rounds the corners of the border */
            }
        </style>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

    <script src="js/organizer.js"></script>
  
	<?php
	include('../components/footer.php');
 
	
	?>