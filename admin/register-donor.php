<?php 
	require_once "../config.php";
	$title = "Register a donor";

	//check if submit
	if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($posts->add_donor) and $post->triggers == 'add_donor'){
                
		$sql = "INSERT INTO `donor` (`name`,`gender`,`dob`, `email`, `address`,`blood_amount`,`status`) VALUES 
								('$posts->name','$posts->gender','$posts->dob','$posts->email','$posts->address','$posts->amount',1)";

		if( mysqli_query($conn, $sql)){
			$fail = "New Donor has been added";

			//check if blood data with email exists
			$sql = "SELECT * FROM `blood_data` WHERE `email` = '$posts->email' ";
			//perform query 
			$result = mysqli_query($conn, $sql);

			if(!empty($result)){
				$query = "UPDATE TABLE `blood_data` SET `blood_group` = '$posts->blood_group', `blood_type` = '$posts->blood_type' WHERE `email` = '$posts->email') VALUES 
				('$posts->email','$posts->blood_group','',1)";
				mysqli_query($conn, $query);
			}else{
				$query2 = "INSERT INTO `blood_data` (`email`,`blood_group`, `blood_type`,`status`) VALUES 
				('$posts->email','$posts->blood_group','$posts->blood_type',1)";
				mysqli_query($conn, $query2);
			}
			
		}else{
			$fail = "Error, Try again";
		}
	
}

?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Register a donor</h3>
		<div class="col-10" style="margin: 0 auto;">
			<form method="POST" name="add_donor">
				<div class="row">
					<div class="col-sm">
					    <label for="inputFirstName" class="">Full Name</label>
					    <input type="text" name="name" id="inputName" class="form-control" placeholder="Full Name" required>
					</div>
					<div class="col-sm">
					    <label for="inputGender" class="">Gender</label>
					    <select class="form-control" id="inputGender" name="gender" required>
			                <option selected disabled value="">Choose...</option>
			                <option value="male">Male</option>
			                <option value="female">Female</option>
			            </select>
					</div>
					<div class="col-sm">
					    <label for="inputDob" class="">Date of Birth</label>
					    <input type="date" name="dob" id="inputDob" class="form-control" required>
					</div>
					<div class="col-sm">
						<label for="inputPhoneNumber" class="">Phone Number</label>
						<input type="tel" id="inputPhoneNumber" name="phone" class="form-control" placeholder="Phone Number" required>
					</div>
					<div class="col-sm">
						<label for="inputEmail" class="">Email Address</label>
						<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" required>
					</div>
					<div class="col-sm">
					    <label for="inputBloodType" class="">Blood Type</label>
					    <select class="form-select" id="inputBloodType" name="blood_type" required>
			                <option value="">Choose...</option>
			                <option value="o">O</option>
			                <option value="a">A</option>
			                <option value="b">B</option>
			                <option value="ab">AB</option>
			            </select>
					</div>
					<div class="col-12">
					    <label for="inputBloodGroup" class="">Blood Group</label>
					    <select class="form-control" id="inputBloodGroup" name="blood_group" required>
			                <option selected disabled value="">Choose...</option>
			                <option value="o-plus">O+</option>
			                <option value="o-minus">O-</option>
			                <option value="a-plus">A+</option>
			                <option value="a-minus">A-</option>
			                <option value="b-plus">B+</option>
			                <option value="b-minus">B-</option>
			                <option value="ab-plus">AB+</option>
			                <option value="ab-minus">AB-</option>
			            </select>
					</div>
					<div class="col-12">
					    <label for="inputBloodAmount" class="">Blood Amount(ml)</label>
					    <input type="number" id="inputBloodAmount" class="form-control" name="amount" placeholder="Enter a number from 200-550" min="200" max="550" required>
					</div>
				</div>
				<?php 
                    if(!empty($fail)){
                        echo '<div class="info" style="vertical-align: middle; align-self: center; width: 50% !important; "><h3>Messages</h3> '.$fail.'</div>';
                    }
                ?>
			    <button class="w-100 mt-2 btn btn-primary btn-lg" type="submit" name="triggers" value="add_donor">Submit</button>
			</form>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>