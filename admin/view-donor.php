<?php 
	require_once "../config.php";
	$title = "View Donor";
?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">View a donor</h3>
		<div class="col-10" style="margin: 0 auto;">
			<a type="button" href="./register-donor.php" class="btn btn-primary" style="float: right; margin-bottom: 60px"><i class="fa fa-edit pr-1"></i>Edit</a>
			<div class="row">
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">First Name:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Last Name:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Age:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Phone Number:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Email:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Address:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Group:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Has donor donated blood before?</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Occupation</span>
						<span>Insert here</span>
					</p>
				</div>
			</div>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>