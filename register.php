<?php
include('config/dbcon.php');
session_start();


?>



<!DOCTYPE html>
<html>
<head>
<title>KLD Events Page</title>
	<link rel="stylesheet" type="text/css" href="student/css/student_login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>


<body>
<img class="wave" src="student/img/wave.png">
	<div class="container">
		<div class="img">
        <img src="student/img/event.svg">
		</div>
		<div class="login-content">
			
		
			<form action="" method="post">
            	<img src="student/img/kldlogo.png">
				<h2 class="title">KLD STUDENT & ORGANIZER REGISTER</h2>
				
				<div class="input-div one">

				
                   
					<div class="i">
							<i class="fas fa-user"></i>
					</div>
					<div class="div">
							<h5>Username</h5>
							<input type="text" class="input" name="username">
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

                <a href="login.php">Click here to go Login page!</a>
                
            </form>
        </div>
    </div>


	<?php
// Check if session has a valid user ID and role
if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];

    // Check if the form has been submitted
    if (isset($_POST['register'])) {
        $username = $_POST['username']; // The username from the form
        $password = $_POST['password']; // The password from the form

        // Remove password hashing (strongly discouraged)
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update based on user role
        if ($user_role == 'student') {
            $sql_update = "UPDATE tbl_std SET username = '$username', password = '$password' WHERE id = '$user_id'";
        } elseif ($user_role == 'organizer') {
            $sql_update = "UPDATE tbl_organizer SET username = '$username', password = '$password' WHERE id = '$user_id'";
        }

        // Execute the query
        $res = mysqli_query($conn, $sql_update);

        // Check if the update was successful
        if ($res) {
            echo '<script>
            swal({
                title: "Success",
                text: "Registration successful!",
                icon: "success"
            }).then(function() {
                window.location = "login.php"; // Redirect on success
            });
            </script>';
        } else {
            // If the update fails, show an error message
            $error = mysqli_error($conn);
            echo '<script>
            swal({
                title: "Error",
                text: "Registration failed. Reason: ' . $error . '",
                icon: "error"
            }).then(function() {
                window.location = "register.php";
            });
            </script>';
        }
    }
} else {
    // If no session is found, redirect to login
    echo '<script>
    swal({
        title: "Error",
        text: "No session found. Please log in again.",
        icon: "error"
    }).then(function() {
        window.location = "login.php";
    });
    </script>';
}
?>



    <script type="text/javascript" src="student/js/main.js"></script>


   
</body>
</html>
