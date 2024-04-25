<?php
include('../config/dbcon.php');
session_start();

if (!isset($_SESSION['admin_id'])) {
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

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM tbl_admin WHERE id = $admin_id";

    // Assuming you are using mysqli for database operations
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $admin_name = $row['username'];
		$image = $row['image'];
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="js/plugins/global/lugins.bundle.css">
	<link rel="stylesheet" href="js/plugins/custom/prismjs/prismjs.bundle.css">

	<link rel="stylesheet" href="../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="../image/kld-logo.png">
</head>
<body>
	
	<!-- SIDEBAR -->
<section id="sidebar">
		<a href="#" class="brand" style="padding-left: 20%;"></i> KLD Events</a>
		<ul class="side-menu">
			<li><a href="dashboard.php" class=""><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="Event Management">Event Management</li>
			<li>
				<a href="#"><i class='bx bxs-dashboard icon' ></i> Events <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="events_calendar.php">Calendar</a></li>
					<li><a href="manage_events.php">View Events</a></li>
					<li><a href="add_events.php">Add Events</a></li>
					<li><a href="pending_events.php">Pending Events</a></li>
				</ul>
			</li>

			<li>
				<a href="#"  class=""><i class='bx bxs-location-plus icon' ></i> Venue <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="manage_venues.php">View Venue</a></li>
					<li><a href="add_venue.php">Add Venue</a></li>
					<li><a href="venue_calendar.php">Venue Calendar</a></li>
	
				</ul>
			</li>


			<li>
				<a href="#" ><i class='bx bxs-category icon' ></i> Category <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="manage_category.php">View Categories</a></li>
					<li><a href="add_category.php">Add Category</a></li>
		
				</ul>
			</li>
		


			<li class="divider" data-text="Users">Users</li>
			<li>
				<a href="#"><i class='bx bxs-user icon' ></i> Organizers <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="manage_organizer.php">View Organizers</a></li>
					<li><a href="add_organizer.php">Add Organizers</a></li>
				</ul>
			</li>
			<li>
    <a href="#"><i class='bx bxs-user icon'></i> Students <i class='bx bx-chevron-right icon-right'></i></a>
    <ul class="side-dropdown">
        <li><a href="manage_user.php">View Students</a></li>
        <li><a href="add_user.php">Add Students</a></li>
	
    </ul>
</li>

<li>
    <a href="#" ><i class='bx bxs-graduation icon'></i> Courses <i class='bx bx-chevron-right icon-right'></i></a>
    <ul class="side-dropdown">
        <li><a href="manage_course.php">View Courses</a></li>
        <li><a href="add_course.php">Add Courses</a></li>
	
    </ul>
</li>

<li>
    <a href="#" ><i class='bx bxs-layout icon'></i> Section <i class='bx bx-chevron-right icon-right'></i></a>
    <ul class="side-dropdown">
        <li><a href="manage_section.php">View Section</a></li>
        <li><a href="add_section.php">Add Section</a></li>
	
    </ul>
</li>

<li>
    <a href="#" class="active"><i class='bx bxs-calendar icon'></i> Year_Level <i class='bx bx-chevron-right icon-right'></i></a>
    <ul class="side-dropdown">
        <li><a href="manage_yearlevel.php">View YearLevel</a></li>
        <li><a href="add_yearlevel.php">Add YearLevel</a></li>
	
    </ul>
</li>

<li>
<a href="#" class=""><i class='bx bxs-user-circle icon'></i> Admin <i class='bx bx-chevron-right icon-right'></i></a>
    <ul class="side-dropdown">
        <li><a href="manage_admin.php">View Admin</a></li>
        <li><a href="add_admin.php">Add Admin</a></li>
    </ul>
</li>

		</ul>
		
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#"></form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">5</span>
			</a>
			
		
			<span class="divider"></span>
			<div class="profile">
				<img src="admin_image/<?php echo $image;?>" alt="">
				<ul class="profile-link">
					<li><p style="padding-left: 10%; padding-top: 3%;">Hi there! <b><?php echo $admin_name;?></b></p></li>
					<li><a href="manage_profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="admin_logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->