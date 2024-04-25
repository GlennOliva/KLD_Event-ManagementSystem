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

		<!-- MAIN -->
		<main>
			<h1 class="title">Add User</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Admin</a></li>
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
                   
                   <option value="<?php echo $course_id; ?>"><?php echo $course_name;?></option>
                                       
                   
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
                   
                   <option value="<?php echo $year_id; ?>"><?php echo $yearlevel;?></option>
                                       
                   
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
                   
                   <option value="<?php echo $section_id; ?>"><?php echo $section_name;?></option>
                                       
                   
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

                            
                            
                            <input type="submit" name="add_user" class="btn btn-primary" value="Add User">
                        </form>
                    </div>
                </div>
            </div>


			<?php
            if(isset($_SESSION['admin_id']))
            {
                $admin_id = $_SESSION['admin_id'];
           
        if(isset($_POST['add_user']))
        {
            $id_no = $_POST['id_no'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $cid = $_POST['courseSelect'];
            $sid = $_POST['sectionSelect'];
            $yid = $_POST['yearSelect'];

            
            
    
    //SQL query to save the data into database
    $sql = "INSERT INTO tbl_std SET  id_no = '$id_no' , name = '$name' , email = '$email', course = '$cid',
    year  = '$yid' , section = '$sid' , admin_id = $admin_id";

    //execute query to insert data in database
    $result = mysqli_query($conn , $sql) or die(mysqli_error());

    //check the query is executed or not

    if ($result == true) {
      
        
        echo '<script>
            swal({
                title: "Success",
                text: "Student Successfully Inserted",
                icon: "success"
            }).then(function() {
                window.location = "manage_user.php";
            });
        </script>';
        
        exit; // Make sure to exit after performing the redirect
    }
    
else{
    echo '<script>
    swal({
        title: "Error",
        text: "Student Failed to  Insert",
        icon: "error"
    }).then(function() {
        window.location = "add_user.php";
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