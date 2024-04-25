<?php
include('../components/org_header_events.php');
include('../config/dbcon.php');

?>


<?php
// Check if the session variable 'user_id' is set
if (isset($_SESSION['user_id'])) {
    // If the session variable is set, assign it to a local variable
    $organizer_id = $_SESSION['user_id'];
} else {
    // If the session variable is not set, redirect to the login page with an error message
    echo '<script>
        swal({
            title: "Error",
            text: "You must login first before you proceed!",
            icon: "error"
        }).then(function() {
            window.location = "../login.php"; // Redirect to the login page
        });
    </script>';
    exit; // Ensure the script exits after redirecting
}

?>

		<!-- MAIN -->
		<main>
			<h1 class="title">Manage Events</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Organizer</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Events</a></li>
			</ul>

            <div class="container mt-3 table-border">
                <a href="add_events.php" class="btn btn-success btn-sm">Create</a>
                <table class="table table-hover" id="admin_table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Events Image</th>
                            <th>Events Title</th>
                            <th>Event Start</th>
                            <th>Event End</th>
                            <th>Event Venue</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// query to get all data from tbl_event and join with tbl_venue to get venue names
$sql = "
    SELECT 
        te.id,
        te.event_image,
        te.event_title,
        te.event_start,
        te.event_end,
        tv.venue_name,
        te.status 
    FROM tbl_event te
    JOIN tbl_venue tv ON te.event_venue = tv.id
    WHERE te.event_organizer = '$organizer_id';
";

// execute the query
$result = mysqli_query($conn, $sql);

// check whether the query executed successfully
if ($result == true) {
    // count the rows to check if there's data in the database
    $count = mysqli_num_rows($result);
    $ids = 1;

    // check the number of rows
    if ($count > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows['id'];
            $event_image = $rows['event_image'];
            $event_title = $rows['event_title'];
            $event_start = $rows['event_start'];
            $event_end = $rows['event_end'];
            $venue_name = $rows['venue_name'];  // Fetch the venue name
            $status = $rows['status'];

            ?>
            <tr>
                <td><?php echo $ids++; ?></td>
                <td><img src="../event_image/<?php echo $event_image; ?>" style="width: 70px;"></td>
                <td><?php echo $event_title; ?></td>
                <td><?php echo $event_start; ?></td>
                <td><?php echo $event_end; ?></td>
                <td><?php echo $venue_name; ?></td>  <!-- Display the venue name -->
                <td><?php echo $status; ?></td>
                <td>
        <?php if ($status === 'Approved') { ?>
            <!-- If status is Approved, make the button non-clickable and change its appearance -->
            <button class="btn btn-primary btn-sm" disabled style="opacity: 0.5; cursor: not-allowed;">Update</button>
        <?php } else { ?>
            <!-- Otherwise, make it clickable and provide the link to update -->
            <a href="update_events.php?id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Update</a>
        <?php } ?>
     
    </td>
            </tr>
            <!-- More rows can be added here -->
            <?php
        }
    }
}
?>

                        <!-- More rows can be added here -->
                    </tbody>
                </table>
            </div>
			

			
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
	<script src="js/event.js"></script>
	<?php
	include('../components/footer.php');
	
	?>