<?php 
	require_once "../base.php";
	$title = "Dashboard";

	//donors available
	$sql = "SELECT COUNT(`email`) as num FROM `donor` WHERE `status` = 1 ";
	$result = mysqli_query($conn, $sql);
	$result =  mysqli_fetch_object($result);
	$donor = $result->num;	

	//recipients available
	$sql = "SELECT COUNT(`email`) as num FROM `recipients` WHERE `status` = 1 ";
	$result = mysqli_query($conn, $sql);
	$result =  mysqli_fetch_object($result);
	$recipient = $result->num;	

	//transactions made 
	$sql = "SELECT COUNT(`transaction_id`) as num FROM `transact` WHERE `status` = 1 ";
	$result = mysqli_query($conn, $sql);
	$result =  mysqli_fetch_object($result);
	$trans = $result->num;
	
	//untested donors  
	$sql = "SELECT COUNT(`email`) as num FROM `donor` WHERE `status` = 0 ";
	$result = mysqli_query($conn, $sql);
	$result =  mysqli_fetch_object($result);
	$test = $result->num;	



?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Home</h3>
		<div class="row">
			
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>
