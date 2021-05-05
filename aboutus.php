<?php 
	$title = 'About Us';
	session_start();
	require_once "config.php";
?>
<?php include "includes/top.php"?>
<!-- start main coding here -->
	<div class="container">
		<div class="row">
			<div class="col-4 p-3 aboutfix">
				<div class="header">
					<h1>About Us</h1>
				</div>
				<div class="main-text">
					<p>
						Haemo Bank is a project developed by group 4 in year 4 of computer science department. <br>
						The basic walk-around is to create a blood bank management system that allows the organization to easi;y manage the information of those who donates or receives blood.
					</p>
					<p>
					All it takes is a little of your time, and you can save lives.
					<br><br>
						<strong>Mission:</strong>	
						To enhance the health and well-being of others through our work with blood and stem cell products and by facilitating scientific research.
						<br><br>
						<strong>Vision:</strong>	
						To become the leading world-class blood system in the innovation of new services, technology and research, that positively impacts blood product safety and availability, and enhances the lives of our team members.
						<br><br>
						<strong>Values:</strong>	
						Execution, Innovation and Continuous Improvement, Agility and Respect
					</p>
				</div>
				<div class="">
					<a class="btn btn-navy btn-lg" href="main-registration.php">Join Us Now</a>
				</div>
			</div>
			<div class="col justify-right">
				<img src="./images/youths.jpg" alt="" class="aboutimg" srcset="">
			</div>
		</div>
	</div>
<!-- end main coding here -->
<?php include "includes/buttom.php"?>