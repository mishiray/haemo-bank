<?php 
	require_once "../base.php";
	$title = "Dashboard";

	//donors available
	$sql = "SELECT COUNT(`email`) as num FROM `donor` WHERE `status` = 1 AND `email` = '$userinfo->email' ";
	$result = mysqli_query($conn, $sql);
	$result =  mysqli_fetch_object($result);
	$donor = $result->num;	

	//recipients available
	$sql = "SELECT COUNT(`email`) as num FROM `recipients` WHERE `status` = 3 AND `email` = '$userinfo->email'  ";
	$result = mysqli_query($conn, $sql);
	$result =  mysqli_fetch_object($result);
	$recipient = $result->num;	

	//untested donors  
	$sql = "SELECT COUNT(`email`) as num FROM `donor` WHERE `status` = 0 AND `email` = '$userinfo->email'  ";
	$result = mysqli_query($conn, $sql);
	$result =  mysqli_fetch_object($result);
	$test = $result->num;	



?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Home</h3>
		<div class="row">
		<div class="col-6">
				<div class="info m-3">
					<h3>Total Donations</h3>
					<h4> <?php echo $donor ?></h4>
				</div>
			</div>
			<div class="col-6">
				<div class="info m-3">
					<h3>Total Received</h3>
					<h4> <?php echo $recipient ?></h4>
				</div>
			</div>
			<div class="col-6">
				<div class="danger m-3">
					<h3>Total Untested Blood Donated</h3>
					<h4> <?php echo $test ?></h4>
				</div>
			</div>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>
