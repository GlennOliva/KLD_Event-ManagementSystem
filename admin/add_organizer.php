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
			<h1 class="title">Add Organizer</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Organizer</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data"  style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                        <div class="mb-3">
                                <label for="adminFullname" class="form-label">Id no</label>
                                <input type="number" class="form-control" name="id_no" placeholder="Enter ID no">
                            </div>
                          
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                            </div>
                            <div class="mb-3">
                                <label for="adminFullname" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="adminFullname" class="form-label">Organization</label>
                                <input type="text" class="form-control" name="org" placeholder="Enter Organization">
                            </div>


                            <div class="mb-3">
                                <label for="adminImage" class="form-label">Image</label>
                                <input type="file" class="form-control" name="orgImage">
                            </div>
                               

                                

                                
                            
                            
                            <input type="submit" name="add_org" class="btn btn-primary" value="Add Organizer">
                        </form>
                    </div>
                </div>
            </div>


			<?php
            if(isset($_SESSION['admin_id']))
            {
                $admin_id = $_SESSION['admin_id'];
           
        if(isset($_POST['add_org']))
        {
            $id_no = $_POST['id_no'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $org = $_POST['org'];
      
            if(isset($_FILES['orgImage']['name']))
            {
                //get the details of the selected image
                $image_name = $_FILES['orgImage']['name'];
        
                //check if the imaage selected or not.
                if ($image_name != "") {
                    // Image is selected
                    // Rename the image
                    $ext_parts = explode('.', $image_name);
                    $ext = end($ext_parts);
                
                    // Create a new name for the image
                    $image_name = "Organizer-Pic" . rand(0000, 9999) . "." . $ext;
                
                    // Upload the image
                
                    // Get the src path and destination path
                
                    // Source path is the current location of the image
                    $src = $_FILES['orgImage']['tmp_name'];
                
                    // Destination path for the image to be uploaded
                    $destination = "organizer_image/" . $image_name;
                
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
                                window.location = "add_organizer.php";
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
    $sql = "INSERT INTO tbl_organizer SET  id_no = '$id_no' , name = '$name' , email = '$email', organization = '$org' , image = '$image_name', admin_id = $admin_id";

    //execute query to insert data in database
    $result = mysqli_query($conn , $sql) or die(mysqli_error());

    //check the query is executed or not

    if ($result == true) {
      
        
        echo '<script>
            swal({
                title: "Success",
                text: "Organizer Successfully Inserted",
                icon: "success"
            }).then(function() {
                window.location = "manage_organizer.php";
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
        window.location = "add_organier.php";
    });
</script>';

exit;

}
}
        }
        
        ?>
			
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