<?php
include('config/dbcon.php');
session_start(); // Start the session
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
                <h2 class="title">KLD STUDENT & ORGANIZER PROCESS</h2>
                
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Id Number</h5>
                        <input type="text" class="input" name="id_no">
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
            <i class="fas fa-user-tag"></i>
        </div>
        <div class="div">
         
            <select name="role" class="custom-select" required>
                <option value="" selected disabled>Choose Role</option>
                <option value="student">Student</option>
                <option value="organizer">Organizer</option>
            </select>
        </div>
    </div>
	
                <input type="submit" name="process" class="btn" value="NEXT">
                <a href="login.php">Click here to go to Login page!</a>
            </form>
        </div>
    </div>

	<style>
		/* Custom styling for the select element */
.custom-select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 16px;
    color: #333;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

/* Adding a dropdown icon to indicate that this is a dropdown */
.input-div .i {
    position: relative;
}

.input-div .i::after {
    content: "\f078"; /* FontAwesome icon for dropdown */
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-family: "Font Awesome 5 Free"; /* Adjust as needed */
    font-weight: 900;
    pointer-events: none;
}

/* Additional styling for the input-div to ensure consistent alignment */
.input-div {
    display: flex;
    align-items: center;
}

	</style>

	<?php
// Check if the form has been submitted
if (isset($_POST['process'])) {
    // Retrieve the email, ID number, and role from the form
    $email = $_POST['email'];
    $id_no = $_POST['id_no'];
    $role = $_POST['role']; // Student or Organizer

    // SQL query to find the user in the appropriate table based on the role
    if ($role == 'student') {
        $sql = "SELECT * FROM tbl_std WHERE email = '$email' AND id_no = '$id_no' AND role = '$role'";
    } elseif ($role == 'organizer') {
        $sql = "SELECT * FROM tbl_organizer WHERE email = '$email' AND id_no = '$id_no' AND role = '$role'";
    } else {
        echo '<script>
            swal({
                title: "Error",
                text: "Invalid role selected.",
                icon: "error"
            }).then(function() {
                window.location = "reg-process.php"; // Redirect to appropriate page
            });
        </script>';
        exit;
    }

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Count the number of rows returned
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // If a match is found, allow registration with further information
		$row = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['user_id'] = $row['id']; // Unique identifier for the user
        $_SESSION['user_role'] = $row['role']; // Role of the user
        echo '<script>
            swal({
                title: "Success",
                text: "Account exists. Proceed to register your username and password.",
                icon: "success"
            }).then(function() {
                window.location = "register.php"; // Redirect to registration page
            });
        </script>';
    } else {
        // If no match is found, indicate an error
        echo '<script>
            swal({
                title: "Error",
                text: "ID number or email does not match the selected role.",
                icon: "error"
            }).then(function() {
                window.location = "reg-process.php"; // Redirect to the appropriate page
            });
        </script>';
    }
}
?>


    
    <script type="text/javascript" src="student/js/main.js"></script>
</body>
</html>
