<?php
include('../components/header_transact.php');
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
			<h1 class="title">Update Transaction</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Update Transaction</a></li>
			</ul>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <form style="border: 2px solid #00204a; padding: 20px; border-radius: 12px;">
                            <div class="mb-3">
                                <label for="organizationTitle" class="form-label">Trabsaction Status</label>
                                <select class="form-control" name="organizationTitle">
                                    <option value="">Select Status</option>
                                    <option value="Approve">Approve</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Revision">Revisions</option>
                                </select>
                            </div>
                            
                            
                            <input type="submit" name="update_transaction" class="btn btn-primary" value="Update Transaction Status">
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