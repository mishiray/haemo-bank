<?php 

	//database connection
	require_once "../config.php";

	
	// convert super globals to objects
	$posts = (object)$_POST;

	SELECT FROM blood_data WHERE email = $userinfo->email
	//check if submit is clicked
	if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["edit_profile"])){
		$posts = (object)$_POST;
		$err = 0;
		$fail = '';


		if($err == 0){

			//insert query
			$query1 = "UPDATE TABLE `userprofile` SET `name` = '$posts->name' , `phone` = '$posts->phone', `address` = '$posts->address', `dob` = '$posts->dob' WHERE `email` = '$posts->email'"; 

			$query2 = "UPDATE TABLE `blood_data` SET `blood_group` = '$posts->blood_group', `blood_type` = '$posts->blood_type' WHERE `email` = '$posts->email'";

			if(mysqli_query($conn, $query1) and mysqli_query($conn, $query2)){
				$fail .= "<p>You have successfully updated your profile</p>";

			}else{
				$fail .= "<p> Unable to update. Please try again</p>";

			}


		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile Page</title>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">	
	<script src="includes/script.js"></script>

</head>
<body>
	<?php include "navbar.php"?>
	<div class="container">
		<h3 class="text-center">Edit Profile</h3>
		<div class="col-10" style="margin: 0 auto;">
			<form method="POST" >
				<div class="row">
					<div class="col-12">
					    <label for="inputName" class="">Full Name</label>
					    <input type="text" id="inputName" name="name" class="form-control" placeholder="Full Name" required>
					</div>
					<div class="col-sm">
						<label for="inputPhoneNumber" class="">Phone Number</label>
						<input type="tel" id="inputPhoneNumber" name="phone" class="form-control" placeholder="Phone Number" required>
					</div>
					<div class="col-sm">
						<label for="inputEmail" class="">Email Address</label>
						<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" required>
					</div>
					<div class="col-12">
					    <label for="inputAddress" class="">Address</label>
					    <textarea id="inputName" name="address" class="form-control" required></textarea>
					</div>
					<div class="col-sm">
					    <label for="inputGender" class="">Gender</label>
					    <select class="form-select" id="inputGender" name="gender" required>
			                <option value="">Choose...</option>
			                <option value="male">Male</option>
			                <option value="female">Female</option>
			            </select>
					</div>
					<div class="col-sm">
					    <label for="inputAge" class="">Date of Birth</label>
					    <input type="date" id="inputAge" name="dob" class="form-control" required>
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
					<div class="col-sm">
					    <label for="inputBloodGroup" class="">Blood Group</label>
					    <select class="form-select" id="inputBloodGroup" name="blood_group" required>
			                <option value="">Choose...</option>
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
				</div>
			    <button class="w-100 mt-2 btn btn-maroon btn-lg" name="edit_profile" type="submit">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>