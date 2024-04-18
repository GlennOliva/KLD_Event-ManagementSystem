<?php
include('../components/header_organization.php');
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
			<h1 class="title">Manage Organization</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Organization</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Organization</a></li>
			</ul>

            <div class="container mt-3 table-border">
                <a href="add_organization.php" class="btn btn-success btn-sm">Create</a>
                <table class="table table-hover" id="admin_table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Organization title:</th>
                            <th>Organization Category</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       <?php
                        //query to get all data from tbl_admin database
                $sql = "SELECT * FROM tbl_org";

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
                            $organizationTitle = $rows['org_title'];
                            $organizationCategory = $rows['org_category'];
                            $date = $rows['created_at'];

                            ?>
                        <tr>
                        <td><?php echo $ids++;?></td>
                            <td><?php echo $organizationTitle;?></td>
                            <td><?php echo $organizationCategory;?></td>
                            <td><?php echo $date;?></td>
                            <td>
                                <a href="update_organization.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm">Update</a>
                                <form action="code.php" method="post">
                                    <button type="button"  class="btn-del delete_orgbtn" value="<?= $id;?>">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        <!-- More rows can be added here -->
                        <?php

                        }
                    }
                    
                }

                ?>
                        <!-- More rows can be added here -->
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