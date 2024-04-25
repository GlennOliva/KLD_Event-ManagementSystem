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
			<h1 class="title">Add Course</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Course</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
						

							<div class="mb-3">
                                <label for="eventTitle" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="courseName" placeholder="Enter Course">
                            </div>
                            

							
                            
                            
                            <button type="submit" name="add_course" class="btn btn-primary">Add Course</button>
                        </form>
                    </div>
                </div>
            </div>

			
		</main>


		<?php

if(isset($_SESSION['admin_id']))

{
	$admin_id = $_SESSION['admin_id'];
		if(isset($_POST['add_course']))
		{
			$courseName = $_POST['courseName'];
		

			



			//SQL query to save the data into database
			$sql = "INSERT INTO tbl_course SET course_name = '$courseName' , admin_id = $admin_id";
		
			//execute query to insert data in database
			$result = mysqli_query($conn , $sql) or die(mysqli_error());
		
			//check the query is executed or not
		
			if ($result == true) {
			  
				
				echo '<script>
					swal({
						title: "Success",
						text: "Course Successfully Inserted",
						icon: "success"
					}).then(function() {
						window.location = "manage_course.php";
					});
				</script>';
				
				exit; // Make sure to exit after performing the redirect
			}
			
		else{
			echo '<script>
			swal({
				title: "Error",
				text: "Category Failed to  Insert",
				icon: "error"
			}).then(function() {
				window.location = "add_course.php";
			});
		</script>';
		
		exit;
		}
		
	}
}
		?>


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