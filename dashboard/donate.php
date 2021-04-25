<?php 
	require_once "../base.php";
	$title = "Donate Blood";

	//check if submit

?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Book an Appointment</h3>
		<div class="col-10" style="margin: 0 auto;">
			<form method="POST" name="add_donor">
				<div class="row">
					<div class="col-sm">
					    <label for="inputBloodAmount" class="">Blood Amount(ml)</label>
					    <input type="number" id="inputBloodAmount" class="form-control" name="amount" placeholder="Enter a number from 200-550" min="200" max="550" required>
					</div>
					<div class="col-sm">
					    <label for="inputDate" class="">Preferred Appointment Date</label>
					    <input type="date" id="inputDate" class="form-control" name="date_added" >
					</div>
				</div>
				<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="position: absolute; z-index: 99999; vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
			    <button class="w-50 mt-2 btn btn-primary btn-lg" type="submit" name="triggers" value="donate">Submit</button>
			</form>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>