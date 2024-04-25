<?php
include('../components/header_events.php');
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

$sql = "SELECT * FROM tbl_event WHERE id=$id";

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
        $current_image = $rows['event_image'];
        $event_title = $rows['event_title'];
        $event_start = $rows['event_start'];
        $event_end = $rows['event_end'];
        $event_venue = $rows['event_venue'];
        $status = $rows['status'];
        $event_desc = $rows['event_description'];
        $event_category = $rows['event_category'];
        $event_organizer = $rows['event_organizer'];
        $event_student = $rows['event_student'];
        $student_id = $rows['student_id'];
    }
    else
    {
        header('Location: manage_venues.php');
        exit();
    }
}

?>

		<!-- MAIN -->
		<main>
			<h1 class="title">Update Pending</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Update Venue</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post"  enctype="multipart/form-data" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                       
                                    <div class="mb-3">
                                <label for="adminStatus" class="form-label">Post Events Status</label>
                                <select class="form-select" id="adminStatus" name="eventStatus">
                                    <option value="Approved" <?php echo ($status == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                    <option value="Rejected" <?php echo ($status == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                                    <option value="Revision" <?php echo ($status == 'Revision') ? 'selected' : ''; ?>>Revision</option>
                                </select>
                            </div>

                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="update_events" class="btn btn-primary" value="Update Events">
                        </form>
                    </div>
                </div>
            </div>

			
		</main>


		<?php
if (isset($_POST['update_events'])) {

    $id = $_POST['id'];
    $eventStatus = $_POST['eventStatus'];



        //create sql query update
        $sql = "UPDATE tbl_event SET status = '$eventStatus' WHERE id = '$id'";

        //execute the query
        $result = mysqli_query($conn,$sql);

        //check the query executed or not
        if($result == True)
        {
            //query update sucess
            echo '<script>
            swal({
                title: "Success",
                text: "Event Status Successfully Update",
                icon: "success"
            }).then(function() {
                window.location = "manage_events.php";
            });
        </script>';
        
        exit; // Make sure to exit after performing the redirect
        }
        else{
            //failed to update
            echo '<script>
                swal({
                    title: "Error",
                    text: "Section Failed to  Update",
                    icon: "error"
                }).then(function() {
                    window.location = "update_pending.php";
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