<?php 
	require_once "../base.php";
	$title = "Register a donor";

	//check if submit
	if($_SERVER['REQUEST_METHOD'] == 'POST' and $posts->triggers == 'add_donor'){
		$sql = "INSERT INTO `donor` (`name`,`phone`,`gender`,`dob`, `email`, `address`,`blood_amount`,`status`) VALUES 
								('$posts->name','$posts->phone','$posts->gender','$posts->dob','$posts->email','$posts->address','$posts->amount',1)";

		if( mysqli_query($conn, $sql)){
			$fail = "New Donor has been added";
			logger($userinfo->email,"register-donor","donor");

			//check if blood data with email exists
			$sql = "SELECT * FROM `blood_data` WHERE `email` = '$posts->email' ";
			//perform query 
			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_object($result);
			if(!empty($result)){
				$query = "UPDATE TABLE `blood_data` SET `blood_group` = '$posts->blood_group',`blood_test` = '$posts->blood_test', `blood_type` = '$posts->blood_type' WHERE `email` = '$posts->email'";
				mysqli_query($conn, $query);
			}else{
				$query2 = "INSERT INTO `blood_data` (`email`,`blood_group`, `blood_type`, `blood_test`, `status`) VALUES 
				('$posts->email','$posts->blood_group','$posts->blood_type','$posts->blood_test',1)";
				mysqli_query($conn, $query2);
			}
			
		}else{
			$fail .= "<p> Unable to register. Please try again <br> ".mysqli_error($conn)."</p>";

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
					    <label for="inputBloodGroup" class="">Blood Group</label>
					    <select class="form-select" id="inputBloodGroup" name="blood_group" required>
			                <option value="">Choose...</option>
			                <option value="o">O</option>
			                <option value="a">A</option>
			                <option value="b">B</option>
			                <option value="ab">AB</option>
			            </select>
					</div>
					<div class="col-sm">
					    <label for="inputBloodType" class="">Blood Type</label>
					    <select class="form-control" id="inputBloodType" name="blood_type" required>
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
					<div class="col-sm">
					    <label for="inputBloodAmount" class="">Blood Amount(ml)</label>
					    <input type="number" id="inputBloodAmount" class="form-control" name="amount" placeholder="Enter a number from 200-550" min="200" max="550" required>
					</div>
					<div class="col-12">
					    <label for="inputAddress" class="">Address</label>
					    <textarea id="inputName" name="address" class="form-control" required></textarea>
					</div>
					<div class="col-sm">
					    <label for="inputTest" class="">Has Blood been Tested</label>
					    <input type="radio" id="bloodTest1" class="form-control-radio" name="blood_test" value="1"> Yes
					    <input type="radio" id="bloodTest2" class="form-control-radio" name="blood_test" value="0"> No
					</div>
				</div>
				
				<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
			    <button class="w-100 mt-2 btn btn-primary btn-lg" type="submit" name="triggers" value="add_donor">Submit</button>
			</form>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>