<?php
include('../components/header_venue.php');
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
			<h1 class="title">Add Venue</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Venue</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
							<div class="mb-3">
                                <label for="adminImage" class="form-label">Venue Image</label>
                                <input type="file" class="form-control" name="venueImage">
                            </div>

							<div class="mb-3">
                                <label for="eventTitle" class="form-label">Venue Name</label>
                                <input type="text" class="form-control" name="venueTitle" placeholder="Enter Venue Title">
                            </div>
                            <div class="mb-3">
                                <label for="eventCategory" class="form-label">Venue Description</label>
                                <textarea class="form-control" name="venueDesc" placeholder="Enter Venue Description"></textarea>
                            </div>

							
                            
                            
                            <button type="submit" name="add_venue" class="btn btn-primary">Add Venue</button>
                        </form>
                    </div>
                </div>
            </div>

			
		</main>


		<?php

if(isset($_SESSION['admin_id']))

{
	$admin_id = $_SESSION['admin_id'];
		if(isset($_POST['add_venue']))
		{
			$venuetitle = $_POST['venueTitle'];
			$venueDesc = $_POST['venueDesc'];

			if(isset($_FILES['venueImage']['name']))
			{
				//get the details of the selected image
				$image_name = $_FILES['venueImage']['name'];
		
				//check if the imaage selected or not.
				if ($image_name != "") {
					// Image is selected
					// Rename the image
					$ext_parts = explode('.', $image_name);
					$ext = end($ext_parts);
				
					// Create a new name for the image
					$image_name = "Venue-Pic" . rand(0000, 9999) . "." . $ext;
				
					// Upload the image
				
					// Get the src path and destination path
				
					// Source path is the current location of the image
					$src = $_FILES['venueImage']['tmp_name'];
				
					// Destination path for the image to be uploaded
					$destination = "venue_image/" . $image_name;
				
					// Upload the food image
					$upload = move_uploaded_file($src, $destination);
				
					// Check if the image uploaded or not
					if ($upload == false) {
						// Failed to upload the image
						echo '<script>
							swal({
								title: "Error",
								text: "Failed to upload image",
								icon: "error"
							}).then(function() {
								window.location = "add_venue.php";
							});
						</script>';
				
						die();
						exit;
					} else {
						// Image uploaded successfully
					}
				}
			
			}
			else
			{
				$image_name = ""; 
			}



			//SQL query to save the data into database
			$sql = "INSERT INTO tbl_venue SET venue_name = '$venuetitle' , venue_desc = '$venueDesc', admin_id = $admin_id, image = '$image_name',   created_at = NOW()
			";
		
			//execute query to insert data in database
			$result = mysqli_query($conn , $sql) or die(mysqli_error());
		
			//check the query is executed or not
		
			if ($result == true) {
			  
				
				echo '<script>
					swal({
						title: "Success",
						text: "Venue Successfully Inserted",
						icon: "success"
					}).then(function() {
						window.location = "manage_venues.php";
					});
				</script>';
				
				exit; // Make sure to exit after performing the redirect
			}
			
		else{
			echo '<script>
			swal({
				title: "Error",
				text: "Organization Failed to  Insert",
				icon: "error"
			}).then(function() {
				window.location = "add_venue.php";
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