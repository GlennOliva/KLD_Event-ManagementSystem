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
			<form  method="post">
				<img src="student/img/kldlogo.png">
				<h2 class="title">KLD STUDENT & ORGANIZER LOGIN</h2>
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
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
            	
            	<input type="submit" name="login" class="btn" value="Login">
                
                <a href="reg-process.php">Click here to create an account!</a>
                <br>
                <a href="admin/admin_login.php">Click here to go to admin!</a>
                <br>

    		<a href="student/index.php">Go to Landing Page</a>
           
            </form>
        </div>
    </div>
    <script type="text/javascript" src="student/js/main.js"></script>
</body>
</html>


<?php


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check the student table
    $sql_student = "SELECT * FROM tbl_std WHERE username = '$username' AND password = '$password'";
    $result_student = mysqli_query($conn, $sql_student);

    // Check the organizer table
    $sql_organizer = "SELECT * FROM tbl_organizer WHERE username = '$username' AND password = '$password'";
    $result_organizer = mysqli_query($conn, $sql_organizer);

    if (mysqli_num_rows($result_student) == 1) {
        $student = mysqli_fetch_assoc($result_student);

        if ($student['acc_status'] == 'Active') {
            $_SESSION['user_id'] = $student['id'];
            $_SESSION['user_role'] = 'student';

            echo '<script>
            swal({
                title: "Success",
                text: "Login successful!",
                icon: "success"
            }).then(function() {
                window.location = "home.php"; // Redirect to student homepage
            });
            </script>';
        } else {
            echo '<script>
            swal({
                title: "Error",
                text: "Your account is inactive. Please contact support.",
                icon: "error"
            }).then(function() {
                window.location = "login.php"; // Redirect back to login
            });
            </script>';
        }
    } elseif (mysqli_num_rows($result_organizer) == 1) {
        $organizer = mysqli_fetch_assoc($result_organizer);

        if ($organizer['acc_status'] == 'Active') {
            $_SESSION['user_id'] = $organizer['id'];
            $_SESSION['user_role'] = 'organizer';

            echo '<script>
            swal({
                title: "Success",
                text: "Login successful!",
                icon: "success"
            }).then(function() {
                window.location = "organizer/manage_events.php"; // Redirect to organizer dashboard
            });
            </script>';
        } else {
            echo '<script>
            swal({
                title: "Error",
                text: "Your account is inactive. Please contact Admin.",
                icon: "error"
            }).then(function() {
                window.location = "login.php"; // Redirect back to login
            });
            </script>';
        }
    } else {
        // No match found in either table
        echo '<script>
        swal({
            title: "Error",
            text: "Username or password is incorrect.",
            icon: "error"
        }).then(function() {
            window.location = "login.php";
        });
        </script>';
    }
}
?>
