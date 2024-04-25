<?php
include('../components/org_header_events.php');
include('../config/dbcon.php');

?>


<?php
if(!isset($_SESSION['user_id']))
{
    echo '<script>
                                    swal({
                                        title: "Error",
                                        text: "You must login first before you proceed!",
                                        icon: "error"
                                    }).then(function() {
                                        window.location = "../login.php";
                                    });
                                </script>';
                                exit;
}

?>


<?php
// Database query to fetch all records from 'tbl_organizer'
$sql = "SELECT * FROM tbl_organizer";

// Execute the query and check for errors
$result = mysqli_query($conn, $sql);
if ($result === false) {
    // Display SQL error message if the query fails
    die("SQL Error: " . mysqli_error($conn));
}

// Check if the query returned any results
$count = mysqli_num_rows($result);

if ($count >= 1) { // Changed condition to check for at least one record
    // Fetch the first row of results
    $rows = mysqli_fetch_assoc($result);

    // Assign fetched data to variables
    $id = isset($rows['id']) ? $rows['id'] : null;
    $id_no = isset($rows['id_no']) ? $rows['id_no'] : null;
    $email = isset($rows['email']) ? $rows['email'] : null;
    $name = isset($rows['name']) ? $rows['name'] : null;
    $organization = isset($rows['organization']) ? $rows['organization'] : null;
    $username = isset($rows['username']) ? $rows['username'] : null;
    $role = isset($rows['role']) ? $rows['role'] : null;
    $current_image = isset($rows['image']) ? $rows['image'] : null;
    $status = isset($rows['acc_status']) ? $rows['acc_status'] : null;

    // Perform additional operations with the fetched data
} else {
    // If no data is found, redirect to 'manage_profile.php'
    header('Location: profile.php');
    exit();
}
?>



<!-- MAIN -->
<main>
			<h1 class="title">Update Organizer Profile</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Update Organizer Profile</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data" style="box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px; border-radius: 12px;">
                        <div class="mb-3">
                                <label for="adminFullname" class="form-label">Profile Image</label>
                                <img src="../admin/organizer_image/<?php echo $current_image;?>" style="width: 30%; margin: 2%;">
                            </div>
                            <div class="mb-3">
                                <label for="adminFullname" class="form-label">Id No.</label>
                                <input type="text" class="form-control" name="id_no" placeholder="Enter full name" value="<?php echo $id_no;?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $email;?>" readonly> 
                            </div>
                            <div class="mb-3">
                                <label for="adminUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $username;?>">
                            </div>
                            <div class="mb-3">
                                <label for="adminPhoneNumber" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Enter full name"  value="<?php echo $name?>">
                            </div>
                            <div class="mb-3">
                                <label for="adminPhoneNumber" class="form-label">Organization</label>
                                <input type="text" class="form-control" name="org" placeholder="Enter phone number" value="<?php echo $organization?>">
                            </div>


                            <div class="mb-3">
                                <label for="adminPhoneNumber" class="form-label">Organization Current Password</label>
                                <input type="password" class="form-control" name="orgCurrentpassword" placeholder="Enter current password">
                                
                            </div>

                            <div class="mb-3">
                                <label for="adminPhoneNumber" class="form-label">Org New Password</label>
                                <input type="password" class="form-control" name="orgNewpassword" placeholder="Enter New password">
                            </div>


                           
                        
                            <div class="mb-3">
                                <label for="adminImage" class="form-label">New Image</label>
                                <input type="file" class="form-control" name="orgImage">
                            </div>
                            
                            <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="submit" name="update_profile" class="btn btn-primary" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div>


            <?php
    
    //check whether the submit button is clicked or not
    if(isset($_POST['update_profile']))
    {
        $id = $_POST['id'];
        $id_no = $_POST['id_no'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $full_name = $_POST['full_name'];
        $org = $_POST['org'];
        $current_image = $_POST['current_image'];
        $orgNewpassword = $_POST['orgNewpassword'];
        $orgCurrentpassword = $_POST['orgCurrentpassword'];

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
                $destination = "../admin/organizer_image/" . $image_name;
            
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
                            window.location = "profile.php";
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

        $sql1 = "SELECT * FROM  tbl_organizer WHERE id = $id && password = '$orgCurrentpassword'";

        $result1 = mysqli_query($conn, $sql1);

        if($result1==true)
        {
            $count1 = mysqli_num_rows($result1);

            if($count1 == 1)
            {
                    //create sql query update
        $sql = "UPDATE tbl_organizer SET id_no = '$id_no', email = '$email', username = '$username', name = '$full_name', 
        organization = '$org', image = '$image_name' , password = '$orgNewpassword'  WHERE id = '$id'";

        //execute the query
        $result = mysqli_query($conn,$sql);

        //check the query executed or not
        if($result == True)
        {
            //query update sucess
            echo '<script>
            swal({
                title: "Success",
                text: "Organizer Profile Successfully Update",
                icon: "success"
            }).then(function() {
                window.location = "profile.php";
            });
        </script>';
        
        exit; // Make sure to exit after performing the redirect
        }
        else{
            //failed to update
            echo '<script>
                swal({
                    title: "Error",
                    text: "Organizer Failed to  Update",
                    icon: "error"
                }).then(function() {
                    window.location = "profile.php";
                });
            </script>';

            exit;
        }
            }
        }
        

        
    }
?>

			

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../script.js"></script>
</body>
</html>