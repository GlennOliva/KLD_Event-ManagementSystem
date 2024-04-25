<?php
include('../components/header_course.php');
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
			<h1 class="title">Manage Course</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Course</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Course</a></li>
			</ul>

            <div class="container mt-3 table-border">
                <a href="add_course.php" class="btn btn-success btn-sm">Create</a>
                <table class="table table-hover" id="admin_table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Course Id</th>
                            <th>Course Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
                        //query to get all data from tbl_admin database
                $sql = "SELECT * FROM tbl_course";

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
                            $courseName = $rows['course_name'];
                       
                        

                            ?>
                        <tr>
                        <td><?php echo $ids++;?></td>
                            <td><?php echo $courseName;?></td>
                            <td>
                                <a href="update_course.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm">Update</a>
                                <form action="code.php" method="post">
                                    <button type="button"  class="btn-del delete_coursebtn" value="<?= $id;?>">Delete</button>
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
	<script src="js/course.js"></script>
	<?php
	include('../components/footer.php');
	
	?>