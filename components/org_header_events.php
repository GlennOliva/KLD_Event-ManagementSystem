<?php
include('../config/dbcon.php');
session_start();

if (!isset($_SESSION['user_id'])) {
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

if (isset($_SESSION['user_id'])) {
    $organizer_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM tbl_organizer WHERE id = $organizer_id";

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
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>Organizer</title>
    <link rel="icon" type="image/x-icon" href="../image/kld-logo.png">
		<!-- FullCalendar CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">

<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
</head>
<body>
	
	<!-- SIDEBAR -->
<section id="sidebar">
		<a href="#" class="brand" style="padding-left: 20%;"></i> KLD Events</a>
		<ul class="side-menu">
	
			<li class="divider" data-text="Event Management">Event Management</li>
			<li>
				<a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Events <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="manage_events.php">View Events</a></li>
					<li><a href="add_events.php">Add Events</a></li>
					
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
				<img src="../admin/organizer_image/<?php echo $image;?>" alt="">
				<ul class="profile-link">
					<li><p style="padding-left: 10%; padding-top: 3%;">Hi there! <b><?php echo $admin_name;?></b></p></li>
					<li><a href="profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="organizer_logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->