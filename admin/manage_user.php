<?php
include('../components/header_user.php');
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
			<h1 class="title">Manage User</h1>
			<ul class="breadcrumbs">
				<li><a href="#">User</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage User</a></li>
			</ul>

            <div class="container mt-3 table-border">
            <a href="add_user.php" class="btn btn-success btn-sm">Create</a>
                <table class="table table-hover" id="admin_table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Id no</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Year_Level</th>
                            <th>Section</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Acc Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// Query to get all data from tbl_std, joined with course, section, and year tables
$sql = "
    SELECT 
        ts.id,
        ts.id_no,
        ts.email,
        ts.name,
        tc.course_name,
        ty.yearlevel,
        tsec.section_name,
        ts.username,
        ts.role,
        ts.acc_status
    FROM tbl_std ts
    LEFT JOIN tbl_course tc ON ts.course = tc.id
    LEFT JOIN tbl_yearlevel ty ON ts.year = ty.id
    LEFT JOIN tbl_section tsec ON ts.section = tsec.id
";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check whether the query executed successfully
if ($result == true) {
    // Count the rows to check if there's data in the database
    $count = mysqli_num_rows($result);
    $ids = 1;

    // Check the number of rows
    if ($count > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows['id'];
            $id_no = $rows['id_no'];
            $email = $rows['email'];
            $name = $rows['name'];
            $course_name = $rows['course_name'];  // Use course_name instead of course_id
            $year_level = $rows['yearlevel'];  // Use year_level instead of year
            $section_name = $rows['section_name'];  // Use section_name instead of section
            $username = $rows['username'];
            $role = $rows['role'];
            $status = $rows['acc_status'];

            ?>
            <tr>
                <td><?php echo $ids++; ?></td>
                <td><?php echo $id_no; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $course_name; ?></td>  <!-- Display course name -->
                <td><?php echo $year_level; ?></td>  <!-- Display year level -->
                <td><?php echo $section_name; ?></td>  <!-- Display section name -->
                <td><?php echo $username; ?></td>
                <td><?php echo $role; ?></td>
                <td><?php echo $status; ?></td>
                <td>
                    <a href="update_user.php?id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Update</a>
                    <form action="code.php" method="post">
                        <button type="button" class="btn-del delete_userbtn" value="<?php echo $id; ?>">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- More rows can be added here -->
            <?php
        }
    }
}
?>

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

    <script src="js/del-user.js"></script>
  
	<?php
	include('../components/footer.php');
 
	
	?>