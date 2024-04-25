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


<?php

//1get the id 
$id = $_GET['id'];

//create sql querty

$sql = "SELECT * FROM tbl_organizer WHERE id=$id";

//execute the query
$result = mysqli_query($conn,$sql);

//check if the query is executed or not!
if($result == True)
{
    //check if the data is available or not
    $count = mysqli_num_rows($result);

    //ccheck if we have admin data or not
    if($count==1)
    {
        //display the details
        //echo "admin available"; 
        $rows = mysqli_fetch_assoc($result);

                            $id = $rows['id'];
                            $id_no = $rows['id_no'];
                            $email = $rows['email'];
                            $name = $rows['name'];
                            $organization = $rows['organization'];
                            $username = $rows['username'];
                            $role = $rows['role'];
                            $status = $rows['acc_status'];
                            $current_image = $rows['image'];

      
    }
    else
    {
        header('Location: manage_organizer.php');
        exit();
    }
}

?>

		<!-- MAIN -->
		<main>
			<h1 class="title">Update Organizer</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Update Organizer</a></li>
			</ul>

            
            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                        
                        <div class="mb-3">
                                <label for="adminFullname" class="form-label">Current Image</label>
                                <img src="organizer_image/<?php echo $current_image;?>" style="width: 30%; margin: 2%;">
                            </div>
                           
                        <div class="mb-3">
                                <label for="adminFullname" class="form-label">Id no</label>
                                <input type="number" class="form-control" name="id_no" placeholder="Enter ID no" value="<?php echo $id_no;?>">
                            </div>
                          
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email;?>">
                            </div>
                            <div class="mb-3">
                                <label for="adminFullname" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $name;?>">
                            </div>

                            <div class="mb-3">
                                <label for="adminFullname" class="form-label">Organization</label>
                                <input type="text" class="form-control" name="org" placeholder="Enter Organization" value="<?php echo $organization?>">
                            </div>

                                


                                <div class="mb-3">
                                <label for="adminStatus" class="form-label">User Status</label>
                                <select class="form-select" id="adminStatus" name="orgStatus">
                                    <option value="Inactive" <?php echo ($status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                                    <option value="Active" <?php echo ($status == 'Active') ? 'selected' : ''; ?>>Active</option>
                                </select>
                            </div>

                            
                                <div class="mb-3">
                                <label for="adminImage" class="form-label">New Image</label>
                                <input type="file" class="form-control" name="organizerImage">
                            </div>
                            
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="update_org" class="btn btn-primary" value="Update Organizer">
                        </form>
                    </div>
                </div>
            </div>

            <?php
    
    //check whether the submit button is clicked or not
    if(isset($_POST['update_org']))
    {
        $id_no = $_POST['id_no'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $org = $_POST['org'];
            $acc_status = $_POST['orgStatus'];
 
            //check whether upload button is click or not
        if(isset($_FILES['organizerImage']['name']))
        {
            $image_name = $_FILES['organizerImage']['name']; //new image nname

            //check if the file is available or not
            if($image_name!="")
            {
                //image is available

                //rename the image
                $ext = end(explode('.', $image_name));
                $image_name = "Organizer-Pic-".rand(0000, 9999).'.'.$ext;

                //get the source path and destination
                $src_path = $_FILES['organizerImage']['tmp_name'];
                $destination_path = "organizer_image/".$image_name;

                //upload the image
                $upload = move_uploaded_file($src_path,$destination_path);

                //check if the image is uploaded or not
                if($upload==false)
                {
                    //failed to upload
                    echo '<script>
                    swal({
                        title: "Error",
                        text: "Failed to upload image",
                        icon: "error"
                    }).then(function() {
                        window.location = "manage_organizer.php";
                    });
                </script>';

                exit;

                                
                }
                //remove the current image if available
                if($current_image!="")
                {
                    //current image is available
                    $remove_path = "organizer_image/".$current_image;

                    $remove = unlink($remove_path);

                    //check whether the image is remove or not
                    if($remove==false)
                    {
                        //failed to remove current image
                        echo '<script>
                        swal({
                            title: "Error",
                            text: "Failed to remove current image",
                            icon: "error"
                        }).then(function() {
                            window.location = "manage_organizer.php";
                        });
                    </script>';

                    exit;

                        
                    }
                }
            }
        }
        else
        {
            $image_name = $current_image;
        }





        //create sql query update
        $sql = "UPDATE tbl_organizer SET id_no = '$id_no' , email = '$email' , name = '$name' ,   
         organization = '$org', acc_status = '$acc_status',  image = '$image_name' WHERE id = '$id'";

        //execute the query
        $result = mysqli_query($conn,$sql);

        //check the query executed or not
        if($result == True)
        {
            //query update sucess
            echo '<script>
            swal({
                title: "Success",
                text: "Organizer Successfully Update",
                icon: "success"
            }).then(function() {
                window.location = "manage_organizer.php";
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
                    window.location = "update_organizer.php";
                });
            </script>';

            exit;
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