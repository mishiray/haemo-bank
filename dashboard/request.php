<?php

	$title= 'Blood Donation Request Page';
	include '../base.php';

	//check if submit
	if($_SERVER['REQUEST_METHOD'] == 'POST' and $posts->triggers == 'request_blood'){
		$sql = "INSERT INTO `recipients` (`name`,`phone`,`gender`,`dob`, `email`, `address`,`blood_amount`,`date_needed`,`purpose`,`status`) VALUES 
								('$userinfo->name','$userinfo->phone','$userinfo->gender','$userinfo->dob','$userinfo->email','$userinfo->address','$posts->amount','$posts->date_needed','$posts->purpose',0)";

		if( mysqli_query($conn, $sql)){
			$fail = "New request has been added";
		}else{
			$fail .= "<p> Unable to register. Please try again <br> ".mysqli_error($conn)."</p>";
		}
	
	}
	
?>
	<?php include "top.php"?>
	<div class="main p-3 container">
		<h3 class="text-center">Make a request</h3>
		<div class="col-8" style="margin: 0 auto;">
			<form action="" method="POST">
				<div class="row">
					<div class="col-12">
					    <label for="inputBloodAmount" class="">Blood Amount(ml)</label>
					    <input type="number" id="inputBloodAmount" class="form-control" placeholder="Enter a number from 200-550" min="200" max="550" name="amount" required>
					</div>
					<div class="col-12">
						<label for="inputDate" class="">How soon do you need it?</label>
						<input type="date" id="inputDate" class="form-control" name="date_needed" required>
					</div>
					<div class="col-12">
					    <label for="inputPurpose" class="">Purpose</label>
					    <textarea id="inputPurpose" class="form-control" name="purpose" required></textarea>
					</div>
				</div>
				<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
			    <button class="w-100 mt-2 btn btn-primary btn-lg" type="submit" name="triggers" value="request_blood">Submit</button>
			</form>
		</div>
	</div>
	<?php include 'buttom.php';