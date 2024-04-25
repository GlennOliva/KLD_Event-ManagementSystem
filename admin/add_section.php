<?php
include('../components/header_section.php');
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
			<h1 class="title">Add Section</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Section</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
						

							<div class="mb-3">
                                <label for="eventTitle" class="form-label">Section Name</label>
                                <input type="text" class="form-control" name="sectionName" placeholder="Enter Section">
                            </div>
                            

							
                            
                            
                            <button type="submit" name="add_section" class="btn btn-primary">Add Section</button>
                        </form>
                    </div>
                </div>
            </div>

			
		</main>


		<?php

if(isset($_SESSION['admin_id']))

{
	$admin_id = $_SESSION['admin_id'];
		if(isset($_POST['add_section']))
		{
			$sectionName = $_POST['sectionName'];
		

			



			//SQL query to save the data into database
			$sql = "INSERT INTO tbl_section SET section_name = '$sectionName' , admin_id = $admin_id";
		
			//execute query to insert data in database
			$result = mysqli_query($conn , $sql) or die(mysqli_error());
		
			//check the query is executed or not
		
			if ($result == true) {
			  
				
				echo '<script>
					swal({
						title: "Success",
						text: "Section Successfully Inserted",
						icon: "success"
					}).then(function() {
						window.location = "manage_section.php";
					});
				</script>';
				
				exit; // Make sure to exit after performing the redirect
			}
			
		else{
			echo '<script>
			swal({
				title: "Error",
				text: "Section Failed to  Insert",
				icon: "error"
			}).then(function() {
				window.location = "add_section.php";
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