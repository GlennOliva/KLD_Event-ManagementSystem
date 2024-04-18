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
			<h1 class="title">Add Organization</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Organization</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                            <div class="mb-3">
                                <label for="organizationTitle" class="form-label">Organization Title</label>
                                <input type="text" class="form-control" name="organizationTitle" placeholder="Enter Organization Title">
                            </div>
                            <div class="mb-3">
                                <label for="eventCategory" class="form-label">Organization Category</label>
                                <input type="text" class="form-control" name="organizationCategory" placeholder="Enter Organization Category">
                            </div>
                            
                            
                            <input type="submit" class="btn btn-primary" name="add_organization" value="Add Organization">
                        </form>
                    </div>
                </div>
            </div>

			
		</main>

		<?php

if(isset($_SESSION['admin_id']))

{
	$admin_id = $_SESSION['admin_id'];
		if(isset($_POST['add_organization']))
		{
			$Organizationtitle = $_POST['organizationTitle'];
			$OrganizationCategory = $_POST['organizationCategory'];

			//SQL query to save the data into database
			$sql = "INSERT INTO tbl_org SET org_title = '$Organizationtitle' , org_category = '$OrganizationCategory', admin_id = $admin_id,  created_at = NOW()
			";
		
			//execute query to insert data in database
			$result = mysqli_query($conn , $sql) or die(mysqli_error());
		
			//check the query is executed or not
		
			if ($result == true) {
			  
				
				echo '<script>
					swal({
						title: "Success",
						text: "Organization Successfully Inserted",
						icon: "success"
					}).then(function() {
						window.location = "manage_organization.php";
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
				window.location = "add_organization.php";
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