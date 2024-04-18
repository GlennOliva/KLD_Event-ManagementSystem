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
                        <form method="post" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                            <div class="mb-3">
                                <label for="eventTitle" class="form-label">Event Title</label>
                                <input type="text" class="form-control" name="venueTitle" placeholder="Enter Venue Title">
                            </div>
                            <div class="mb-3">
                                <label for="eventCategory" class="form-label">Event Category</label>
                                <input type="text" class="form-control" name="venueCategory" placeholder="Enter Venue Category">
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
			$venueCategory = $_POST['venueCategory'];

			//SQL query to save the data into database
			$sql = "INSERT INTO tbl_venue SET venue_title = '$venuetitle' , venue_category = '$venueCategory', admin_id = $admin_id,  created_at = NOW()
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