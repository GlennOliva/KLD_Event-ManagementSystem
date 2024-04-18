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
			<h1 class="title">Manage Transaction</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Event Transactions</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Transaction</a></li>
			</ul>

            <div class="container mt-3 table-border">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Event Title</th>
                            <th>Event Description</th>
                            <th>Event category</th>
                            <th>Event Organizer</th>
                            <th>Image</th>
                            <th>Date of propose</th>
							<th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>johndoe@example.com</td>
                            <td>j0349349349</td>
                            <td>image</td>
                            <td>09831</td>
							<td>Approved</td>
                            <td>
                                <a href="update_transaction.php" class="btn btn-primary btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" >Delete</button>
                            </td>
                        </tr>
                        <!-- More rows can be added here -->
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
	<?php
	include('../components/footer.php');
	
	?>