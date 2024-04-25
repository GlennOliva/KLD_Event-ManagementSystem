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

$sql = "SELECT * FROM tbl_std WHERE id=$id";

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
        $course = $rows['course'];
        $year = $rows['year'];
        $section = $rows['section'];
        $username = $rows['username'];
        $role = $rows['role'];
        $status = $rows['acc_status'];

      
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
                                    <label for="courseSelect" class="form-label">Select Course</label>
                                    <select class="form-control" name="courseSelect" id="courseSelect">
                                    <?php
                                // Query to fetch all courses from the table
                                $sql = "SELECT * FROM tbl_course";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                               $count = mysqli_num_rows($result);
                               if($count > 0 )
                               {
                                   while($row = mysqli_fetch_assoc($result))
                                   {   
                                       $course_id = $row['id'];
                                       $course_name = $row['course_name'];
                                      
                                       ?>
                   
                                        <option <?php if($row['id'] == $course_id) {echo "selected";} ?> value="<?php echo $course_id; ?>"><?php echo $course_name;?></option>
                                       
                   
                                       <?php
                                   }
                               }

                               else
                               {
                                   //we don't have faculty member
                                   ?>
                                   <option value="0" >No Course Found</option>                                    
                   
                                   <?php
                               }
                               ?>
                                    </select>
                      
                                </div>


                                <div class="mb-3">
                                    <label for="courseSelect" class="form-label">Select Year</label>
                                    <select class="form-control" name="yearSelect" id="courseSelect">
                                    <?php
                                // Query to fetch all courses from the table
                                $sql = "SELECT * FROM tbl_yearlevel";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                               $count = mysqli_num_rows($result);
                               if($count > 0 )
                               {
                                   while($row = mysqli_fetch_assoc($result))
                                   {   
                                       $year_id = $row['id'];
                                       $yearlevel = $row['yearlevel'];
                                      
                                       ?>
                   
                   <option <?php if($row['id'] == $year_id) {echo "selected";} ?>  value="<?php echo $year_id; ?>"><?php echo $yearlevel;?></option>
                                       
                   
                                       <?php
                                   }
                               }
                               else
                               {
                                   //we don't have faculty member
                                   ?>
                                   <option value="0" >No Year Found</option>                                    
                   
                                   <?php
                               }
                               ?>
                                    </select>
                                   
                                </div>


                                <div class="mb-3">
                                    <label for="courseSelect" class="form-label">Select Section</label>
                                    <select class="form-control" name="sectionSelect" id="courseSelect">
                                    <?php
                                // Query to fetch all courses from the table
                                $sql = "SELECT * FROM tbl_section";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                               $count = mysqli_num_rows($result);
                               if($count > 0 )
                               {
                                   while($row = mysqli_fetch_assoc($result))
                                   {   
                                       $section_id = $row['id'];
                                       $section_name = $row['section_name'];
                                      
                                       ?>
                   
                   <option <?php if($row['id'] == $section_id) {echo "selected";} ?>  value="<?php echo $section_id; ?>"><?php echo $section_name;?></option>
                                       
                   
                                       <?php
                                   }
                               }
                               else
                               {
                                   //we don't have faculty member
                                   ?>
                                   <option value="0" >No Section Found</option>                                    
                   
                                   <?php
                               }
                               ?>
                                    </select>
                                
                                </div>

                                <div class="mb-3">
                                <label for="adminStatus" class="form-label">User Status</label>
                                <select class="form-select" id="adminStatus" name="userStatus">
                                    <option value="Inactive" <?php echo ($status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                                    <option value="Active" <?php echo ($status == 'Active') ? 'selected' : ''; ?>>Active</option>
                                </select>
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
        $id_no = $_POST['id_no'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $cid = $_POST['courseSelect'];
        $sid = $_POST['sectionSelect'];
        $yid = $_POST['yearSelect'];
        $acc_status = $_POST['userStatus'];
 



        //create sql query update
        $sql = "UPDATE tbl_std SET id_no = '$id_no' , email = '$email' , name = '$name' ,   
         course = '$cid', year = '$yid', section = '$sid', acc_status = '$acc_status' WHERE id = '$id'";

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