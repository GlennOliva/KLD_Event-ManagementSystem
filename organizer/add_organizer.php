<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<title>Admin</title>
    <link rel="icon" type="image/x-icon" href="../image/kld-logo.png">
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" style="padding-top: 5%;">
		 <img src="image/kld-logo.png" style="width: 90%; height: auto; padding-top: 25%;" alt="Logo"> 
		  </a>
		  
		<ul class="side-menu" style="padding-top: 10%;">
			<li><a href="#" class="active"><i class='bx bxs-building icon' ></i> Manage Organizer</a></li>
			<li><a href="#" class=""><i class='bx bxs-building icon' ></i> Manage Event Org</a></li>
            <li><a href="#" class=""><i class='bx bxs-file icon' ></i> Manage Event Report</a></li>
	
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
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><p style="padding-left: 10%; padding-top: 3%;">Hi there! <b>Admin</b></p></li>
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="#"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Add Organizer</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Add Organizer</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                            <div class="mb-3">
                                <label for="adminFullname" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="organizerFullname" placeholder="Enter full name">
                            </div>
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="organizerEmail" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="adminUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="organizerUsername" placeholder="Enter username">
                            </div>
                            <div class="mb-3">
                                <label for="adminPhoneNumber" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="organizerPhoneNumber" placeholder="Enter phone number">
                            </div>
                            <div class="mb-3">
                                <label for="adminPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="organizerPassword" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="adminImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="organizerImage">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add Organizer</button>
                        </form>
                    </div>
                </div>
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

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../script.js"></script>
</body>
</html>