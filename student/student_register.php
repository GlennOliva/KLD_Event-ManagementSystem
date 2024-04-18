<?php
include('../config/dbcon.php');
session_start();


?>



<!DOCTYPE html>
<html>
<head>
<title>KLD Events Page</title>
	<link rel="stylesheet" type="text/css" href="css/student_login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>


<body>
<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
        <img src="img/event.svg">
		</div>
		<div class="login-content">
			
		
			<form action="" method="post">
            	<img src="img/kldlogo.png">
				<h2 class="title">KLD STUDENT REGISTER</h2>
				
				<div class="input-div one">

				
                   
					<div class="i">
							<i class="fas fa-user"></i>
					</div>
					<div class="div">
							<h5>Full name</h5>
							<input type="text" class="input" name="full_name">
					</div>
				 </div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" class="input" name="email">
           		   </div>
           		</div>
				   <div class="input-div one">
					<div class="i">
							<i class="fas fa-phone"></i>
					</div>
					<div class="div">
							<h5>Phone Number</h5>
							<input type="number" class="input" name="phone_number" maxlength="11">
					</div>
				 </div>
				 
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            
            	<input type="submit" name="register" class="btn" value="REGISTER">

                <a href="student_login.php">Click here to go Login page!</a>
                
            </form>
        </div>
    </div>


	<?php
	if (isset($_POST['register'])) {
		$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);  // Directly using the password from form input
	
		// Prepare the SQL statement to avoid SQL injection
		$stmt = mysqli_prepare($conn, "INSERT INTO tbl_user (full_name, email, phone_number, password, created_at) VALUES (?, ?, ?, ?, NOW())");
	
		if (!$stmt) {
			echo '<script>console.error("Prepare failed: ' . mysqli_error($conn) . '");</script>';
			exit;
		}
	
		mysqli_stmt_bind_param($stmt, 'ssss', $full_name, $email, $phone_number, $password);
		$result = mysqli_stmt_execute($stmt);
	
		if ($result) {
			echo '<script>
				swal({
					title: "Success",
					text: "Student Successfully Registered",
					icon: "success"
				}).then(function() {
					window.location = "student_login.php";
				});
				</script>';
		} else {
			echo '<script>
				console.error("Execute failed: ' . mysqli_stmt_error($stmt) . '");
				swal({
					title: "Error",
					text: "Student Failed to Register",
					icon: "error"
				}).then(function() {
					window.location = "student_register.php";
				});
				</script>';
		}
	
		mysqli_stmt_close($stmt);
	}
	
	?>
	


    <script type="text/javascript" src="js/main.js"></script>


   
</body>
</html>
