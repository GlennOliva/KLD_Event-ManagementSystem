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


		<!-- MAIN -->
		<main>
			<h1 class="title">Add Events</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Events</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data" style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
							
                         <!-- Event Venue -->
                            <div class="mb-3">
                                <label for="eventVenue" class="form-label">Event Venue</label>
                                <select class="form-control" name="eventVenue" id="eventVenue">
                                <?php
                                // Query to fetch all courses from the table
                                $sql = "SELECT * FROM tbl_venue";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                               $count = mysqli_num_rows($result);
                               if($count > 0 )
                               {
                                   while($row = mysqli_fetch_assoc($result))
                                   {   
                                       $venue_id = $row['id'];
                                       $venue_name = $row['venue_name'];
                                      
                                       ?>
                   
                   <option value="<?php echo $venue_id; ?>"><?php echo $venue_name;?></option>
                                       
                   
                                       <?php
                                   }
                               }
                               else
                               {
                                  
                                   ?>
                                   <option value="0" >No Venue Found</option>                                    
                   
                                   <?php
                               }
                               ?>
                                </select>
                               
                            </div>


            
                            

                             <!-- Event Start Date -->
                                <div class="mb-3">
                                    <label for="eventStartDate" class="form-label">Event Start Date</label>
                                    <input type="date" class="form-control" name="eventStartDate" id="eventStartDate">
                                </div>

                                    <!-- Event End Date -->
                                    <div class="mb-3">
                                        <label for="eventEndDate" class="form-label">Event End Date</label>
                                        <input type="date" class="form-control" name="eventEndDate" id="eventEndDate">
                                    </div>

                                    <!-- Event Title -->
                                    <div class="mb-3">
                                        <label for="eventTitle" class="form-label">Event Title</label>
                                        <input type="text" class="form-control" name="eventTitle" id="eventTitle" placeholder="Enter Event Title">
                                    </div>

                                    <!-- Event Description -->
                                    <div class="mb-3">
                                        <label for="eventDescription" class="form-label">Event Description</label>
                                        <textarea class="form-control" name="eventDescription" id="eventDescription" rows="3" placeholder="Enter Event Description"></textarea>
                                    </div>

                                    <!-- Event Category -->
                                        <div class="mb-3">
                                            <label for="eventCategory" class="form-label">Event Category</label>
                                            <select class="form-control" name="eventCategory" id="eventCategory">
                                            <?php
                                // Query to fetch all courses from the table
                                $sql = "SELECT * FROM tbl_category";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                               $count = mysqli_num_rows($result);
                               if($count > 0 )
                               {
                                   while($row = mysqli_fetch_assoc($result))
                                   {   
                                       $category_id = $row['id'];
                                       $category_name = $row['category_name'];
                                      
                                       ?>
                   
                   <option value="<?php echo $category_id; ?>"><?php echo $category_name;?></option>
                                       
                   
                                       <?php
                                   }
                               }
                               else
                               {
                                   //we don't have faculty member
                                   ?>
                                   <option value="0" >No Category Found</option>                                    
                   
                                   <?php
                               }
                               ?>


                                            </select>
                                           

                                        </div>

                                        <!-- Event Organizer -->
                                        <div class="mb-3">
                                            <label for="eventOrganizer" class="form-label">Event Organizer</label>
                                            <select class="form-control" name="eventOrganizer" id="eventOrganizer">
                                                
 <?php
                                // Query to fetch all courses from the table
                                $sql = "SELECT * FROM tbl_organizer";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                               $count = mysqli_num_rows($result);
                               if($count > 0 )
                               {
                                   while($row = mysqli_fetch_assoc($result))
                                   {   
                                       $organizer_id = $row['id'];
                                       $organization_name = $row['organization'];
                                      
                                       ?>
                   
                   <option value="<?php echo $organizer_id; ?>"><?php echo $organization_name;?></option>
                                       
                   
                                       <?php
                                   }
                               }
                               else
                               {
                                   //we don't have faculty member
                                   ?>
                                   <option value="0" >No Organization Found</option>                                    
                   
                                   <?php
                               }
                               ?>

                                            </select>
                                           
                                        </div>

                                    <!-- Event Image Poster -->
                                    <div class="mb-3">
                                        <label for="eventImage" class="form-label">Event Image</label>
                                        <input type="file" class="form-control" name="eventImage" id="eventImage">
                                    </div>
    

                                     <!-- Select Event Attendees -->
                                    <div class="mb-3">
                                        <label for="eventAttendees" class="form-label">Select Event Attendees</label>
                                        <select class="form-control" name="eventAttendees[]" id="eventAttendees" multiple>
                                        <?php
                                // Query to fetch all courses from the table
                                $sql = "SELECT * FROM tbl_std";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                               $count = mysqli_num_rows($result);
                               if($count > 0 )
                               {
                                   while($row = mysqli_fetch_assoc($result))
                                   {   
                                       $student_id = $row['id'];
                                       $student_name = $row['name'];
                                      
                                       ?>
                   
                   <option value="<?php echo $student_id; ?>"><?php echo $student_name;?></option>
                                       
                   
                                       <?php
                                   }
                               }
                               else
                               {
                                   //we don't have faculty member
                                   ?>
                                   <option value="0" >No Student Found</option>                                    
                   
                                   <?php
                               }
                               ?>
                                        </select>
                                        <input type="hidden" name="sid" value="<?php echo $student_name; ?>">

                                    </div>
                 



                            
                            
                            <button type="submit" name="add_events" class="btn btn-primary">Add Events</button>
                        </form>
                    </div>
                </div>
            </div>

			
		</main>


		<?php
if (isset($_POST['add_events'])) {
    // Extract basic event information from the POST request
    $vid = $_POST['eventVenue'];
    $eventStartDate = $_POST['eventStartDate'];
    $eventEndDate = $_POST['eventEndDate'];
    $eventTitle = $_POST['eventTitle'];
    $eventDescription = $_POST['eventDescription'];
    $cid = $_POST['eventCategory'];
    $oid = $_POST['eventOrganizer'];
    $eventAttendees = $_POST['eventAttendees'];
    $sid = $_POST['sid'];

    // Handle the image upload
    if (isset($_FILES['eventImage']['name'])) {
        $image_name = $_FILES['eventImage']['name'];

        if ($image_name != "") {
            // Get the image extension and create a new filename
            $ext_parts = explode('.', $image_name);
            $ext = end($ext_parts);
            $new_image_name = "Event-Pic" . rand(0000, 9999) . "." . $ext;

            // Define the source and destination paths
            $src = $_FILES['eventImage']['tmp_name'];
            $destination = "../event_image/" . $new_image_name;

            // Try to upload the image
            $upload = move_uploaded_file($src, $destination);

            if (!$upload) {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Failed to upload image",
                        icon: "error"
                    }).then(function() {
                        window.location = "add_events.php";
                    });
                </script>';
                die();
            } else {
                $image_name = $new_image_name; // Use the new image name
            }
        } else {
            $image_name = ""; // No image uploaded
        }
    } else {
        $image_name = ""; // No file input received
    }

    // Query to get events with overlapping dates for the same venue
$check_query = "SELECT * FROM tbl_event WHERE event_venue = '$vid' AND ((event_start BETWEEN '$eventStartDate' AND '$eventEndDate') OR (event_end BETWEEN '$eventStartDate' AND '$eventEndDate'))";

$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // If there's any overlap, prevent booking
    echo '<script>
        swal({
            title: "Error",
            text: "This venue is already booked for the selected dates.",
            icon: "error"
        }).then(function() {
            window.location = "add_events.php";
        });
    </script>';
    exit;
}

    // Ensure eventAttendees is valid
    if (is_array($eventAttendees) && !empty($eventAttendees)) {
        $errors = []; // Collect insertion errors

        // Loop through attendees
        foreach ($eventAttendees as $attendee_id) {
            // Fetch the student name based on the current student ID
            $student_query = "SELECT name FROM tbl_std WHERE id = $attendee_id";
            $student_result = mysqli_query($conn, $student_query);
            
            if ($student_result && mysqli_num_rows($student_result) > 0) {
                $student_row = mysqli_fetch_assoc($student_result);
                $student_name = $student_row['name'];
            } else {
                $student_name = "Unknown";
            }

            // SQL query to insert the event with the correct student name
            $sql = "INSERT INTO tbl_event (
                event_venue,
                event_start,
                event_end,
                event_title,
                event_description,
                event_category,
                event_organizer,
                event_image,
                event_student,
                student_id,
                status
            ) VALUES (
                '$vid',
                '$eventStartDate',
                '$eventEndDate',
                '$eventTitle',
                '$eventDescription',
                '$cid',
                '$oid',
                '$image_name',
                '$student_name', 
                '$attendee_id',
                'Approved'
            )";

            // Execute the insertion
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                $errors[] = "Failed to insert attendee with ID: $attendee_id. Error: " . mysqli_error($conn);
            }
        }

        if (empty($errors)) {
            echo '<script>
                swal({
                    title: "Success",
                    text: "Events Successfully Created",
                    icon: "success"
                }).then(function() {
                    window.location = "manage_events.php";
                });
            </script>';
        } else {
            $error_messages = implode(", ", $errors);
            echo '<script>
                swal({
                    title: "Error",
                    text: "Some attendees failed to be inserted: ' . $error_messages . '",
                    icon: "error"
                }).then(function() {
                    window.location = "add_events.php";
                });
            </script>';
        }
    } else {
        echo '<script>
            swal({
                title: "Error",
                text: "No attendees were selected.",
                icon: "error"
            }).then(function() {
                window.location = "add_events.php";
            });
        </script>';
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