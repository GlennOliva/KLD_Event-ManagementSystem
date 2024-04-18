<?php
include('../components/header_dashboard.php');
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
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card">

								<?php
				// Assuming $conn is your database connection and is already opened

				$sql = "SELECT COUNT(*) AS count FROM tbl_venue";
				$res = mysqli_query($conn, $sql);

				if ($res) {
					$row = mysqli_fetch_assoc($res);
					$venueCount = $row['count']; // Directly access the count
				} else {
					$venueCount = 0; // In case the query fails
				}
				?>
				<div class="head">
					<div>
						<h2><?php echo $venueCount; ?></h2>
						<p>Events no.</p>
					</div>
					<i class='bx bx-trending-up icon' ></i>
				</div>

				<?php
				// Assuming $conn is your database connection and is already opened

				$sql = "SELECT COUNT(*) AS count FROM tbl_user";
				$res = mysqli_query($conn, $sql);

				if ($res) {
					$row = mysqli_fetch_assoc($res);
					$userCount = $row['count']; // Directly access the count
				} else {
					$venueCount = 0; // In case the query fails
				}
				?>

				
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $userCount; ?></h2>
							<p>User No.</p>
						</div>
						<i class='bx bx-trending-down icon down' ></i>
					</div>

					
					<?php
				// Assuming $conn is your database connection and is already opened

				$sql = "SELECT COUNT(*) AS count FROM tbl_org";
				$res = mysqli_query($conn, $sql);

				if ($res) {
					$row = mysqli_fetch_assoc($res);
					$orgCount = $row['count']; // Directly access the count
				} else {
					$venueCount = 0; // In case the query fails
				}
				?>
				
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $orgCount;?></h2>
							<p>Org no.</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
				
				</div>

				<?php
				// Assuming $conn is your database connection and is already opened

				$sql = "SELECT COUNT(*) AS count FROM tbl_admin";
				$res = mysqli_query($conn, $sql);

				if ($res) {
					$row = mysqli_fetch_assoc($res);
					$adminCount = $row['count']; // Directly access the count
				} else {
					$venueCount = 0; // In case the query fails
				}
				?>

				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $adminCount;?></h2>
							<p>Admin no.</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
					
				</div>
			</div>
			

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<?php
	include('../components/footer.php');
	
	?>