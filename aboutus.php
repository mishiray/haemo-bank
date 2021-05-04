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
					<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, nisi earum. Est quis ipsa quasi ut officiis suscipit error quaerat voluptatem modi, iusto veritatis minima in quod sed culpa qui.</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sint voluptates deleniti, illum, necessitatibus voluptatum assumenda laborum enim alias eos nostrum, suscipit cum saepe impedit rem consequuntur ad distinctio! Deleniti!</p>
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