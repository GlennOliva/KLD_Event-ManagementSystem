<?php
include('../components/header_venue.php');
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


<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>

		<!-- MAIN -->
		<main>
			<h1 class="title">Manage Venues</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Venues</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Venues Calendar</a></li>
			</ul>

            
			<div id='calendar'></div>

			
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
	<script src="js/venue.js"></script>
    
	<?php
	include('../components/footer.php');
	
	?>