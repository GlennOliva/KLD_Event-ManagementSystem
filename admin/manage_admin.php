<?php
include('../components/header_admin.php');
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
			<h1 class="title">Manage Admin</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Admin</a></li>
			</ul>

            <div class="container mt-3 table-border">
                <a href="add_admin.php" class="btn btn-success btn-sm">Create</a>
                <table class="table table-hover" id="admin_table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Full_Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone_number</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //query to get all data from tbl_admin database
                $sql = "SELECT * FROM tbl_admin";

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
                            $full_name = $rows['full_name'];
                            $email = $rows['email'];
                            $username = $rows['username'];
                            $phone_number = $rows['phone_number'];
                            $image_name = $rows['image'];
                            $date = $rows['created_at'];
                            $status = $rows['status'];

                            ?>
                        <tr>
                        <td><?php echo $ids++;?></td>
                            <td><?php echo $full_name;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $username;?></td>
                            <td><?php echo $phone_number;?></td>
                            <td><img src="admin_image/<?php echo $image_name?>" style="width: 70px;"></td>
                            <td><?php echo $date;?></td>
                            <td><?php echo $status;?></td>
                            <td>
                                <a href="update_admin.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm">Update</a>
                                <form action="code.php" method="post">
                                    <button type="button"  class="btn-del delete_adminbtn" value="<?= $id;?>">Delete</button>
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

    <?php
	include('../components/footer.php');
	
	?>