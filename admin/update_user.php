<?php
include('../components/header_user.php');
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

$sql = "SELECT * FROM tbl_user WHERE id=$id";

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
        $full_name = $rows['full_name'];
        $email = $rows['email'];
        $phone_number = $rows['phone_number'];
        $course = $rows['course'];
        $year_level = $rows['year_level'];
        $section = $rows['section'];
        $date = $rows['created_at'];

      
    }
    else
    {
        header('Location: manage_user.php');
        exit();
    }
}

?>

		<!-- MAIN -->
		<main>
			<h1 class="title">Update user</h1>
			<ul class="breadcrumbs">
				<li><a href="#">User</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Update User</a></li>
			</ul>

            
            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                           
                            <div class="mb-3">
                                <label for="adminFullname" class="form-label">New Full Name</label>
                                <input type="text" class="form-control" name="userFullname" placeholder="Enter full name" value="<?php echo $full_name;?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">New Email</label>
                                <input type="email" class="form-control" name="userEmail" placeholder="Enter email" value="<?php echo $email;?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="adminPhoneNumber" class="form-label">New Phone Number</label>
                                <input type="number" class="form-control" name="userPhoneNumber" placeholder="Enter phone number" value="<?php echo $phone_number;?>" readonly maxlength="11">
                            </div>
                            <div class="mb-3">
                                <label for="userCourse" class="form-label">New Course</label>
                                <input type="text" class="form-control" name="userCourse" placeholder="Enter Course" value="<?php echo $course;?>">
                            </div>
                            <div class="mb-3">
                                <label for="userYearlevel" class="form-label">New Year Level</label>
                                <input type="text" class="form-control" name="userYearlevel" placeholder="Enter Year Level" value="<?php echo $year_level;?>">
                            </div>
                            <div class="mb-3">
                                <label for="userSection" class="form-label">New Section</label>
                                <input type="text" class="form-control" name="userSection" placeholder="Enter Section" value="<?php echo $section;?>">
                            </div>
                            
                        
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="update_user" class="btn btn-primary" value="Update User">
                        </form>
                    </div>
                </div>
            </div>

            <?php
    
    //check whether the submit button is clicked or not
    if(isset($_POST['update_user']))
    {
        $id = $_POST['id'];
        $full_name = $_POST['userFullname'];
        $user_email = $_POST['userEmail'];
        $user_phonenumber = $_POST['userPhoneNumber'];
        $user_course = $_POST['userCourse'];
        $user_yearlevel = $_POST['userYearlevel'];
        $user_section = $_POST['userSection'];
 



        //create sql query update
        $sql = "UPDATE tbl_user SET full_name = '$full_name' , email = '$user_email' , phone_number = '$user_phonenumber' ,   
          course = '$user_course', year_level = '$user_yearlevel', section = '$user_section' WHERE id = '$id'";

        //execute the query
        $result = mysqli_query($conn,$sql);

        //check the query executed or not
        if($result == True)
        {
            //query update sucess
            echo '<script>
            swal({
                title: "Success",
                text: "Student Successfully Update",
                icon: "success"
            }).then(function() {
                window.location = "manage_user.php";
            });
        </script>';
        
        exit; // Make sure to exit after performing the redirect
        }
        else{
            //failed to update
            echo '<script>
                swal({
                    title: "Error",
                    text: "Student Failed to  Update",
                    icon: "error"
                }).then(function() {
                    window.location = "update_user.php";
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