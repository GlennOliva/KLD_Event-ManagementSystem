<?php
include('../components/header_course.php');
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


$id = $_GET['id'];

//create sql querty

$sql = "SELECT * FROM tbl_course WHERE id=$id";

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
        $courseName = $rows['course_name'];

      
    }
    else
    {
        header('Location: manage_course.php');
        exit();
    }
}

?>

		<!-- MAIN -->
		<main>
			<h1 class="title">Update Course</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Update Course</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post"  enctype="multipart/form-data" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                       
                            <div class="mb-3">
                                <label for="eventTitle" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="courseName" placeholder="Enter Course" value="<?php echo $courseName;?>">
                            </div>
                           

                          

                           
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="update_course" class="btn btn-primary" value="Update Category">
                        </form>
                    </div>
                </div>
            </div>

			
		</main>


		<?php
    
    //check whether the submit button is clicked or not
    if(isset($_POST['update_course']))
    {
        $id = $_POST['id'];
        $courseName = $_POST['courseName'];
       
        

        


        //create sql query update
        $sql = "UPDATE tbl_course SET course_name = '$courseName' WHERE id = '$id'";

        //execute the query
        $result = mysqli_query($conn,$sql);

        //check the query executed or not
        if($result == True)
        {
            //query update sucess
            echo '<script>
            swal({
                title: "Success",
                text: "Course Successfully Update",
                icon: "success"
            }).then(function() {
                window.location = "manage_course.php";
            });
        </script>';
        
        exit; // Make sure to exit after performing the redirect
        }
        else{
            //failed to update
            echo '<script>
                swal({
                    title: "Error",
                    text: "Category Failed to  Update",
                    icon: "error"
                }).then(function() {
                    window.location = "update_course.php";
                });
            </script>';

            exit;
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

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../script.js"></script>
</body>
</html>