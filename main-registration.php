<?php 

	//database connection
	require_once "config.php";

	
	// convert super globals to objects
	$posts = (object)$_POST;

	//check if submit is clicked
	if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["register"])){
		
		// Check if email empty
		if(empty(trim($_POST["email"]))){
			$fail .= "<p>Please enter email.</p>";
			$err++;
		}else{
			// Check if email exists
			$email = strtolower(trim($_POST["email"]));
			$sql = "SELECT `email` FROM `userprofile` WHERE ( `email`= '$email' )";
			
			//perform query with conection
			$result = mysqli_query($conn, $sql);
			if(!empty($result)){
				$fail .= "<p>Please Login. User already exists</p>";
				$err++;
			}
		}

		if($err == 0){

			//insert query
			$query = "";

			if(mysqli_query($conn, $sql)){
				$fail .= "<p>You have successfully registered. Please login</p>";

			}else{
				$fail .= "<p> Unable to register. Please try again</p>";

			}


		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">	
	<script src="includes/script.js"></script>

</head>
<body>
	<?php include "navbar.php"?>
	<div class="container">
		<h3 class="text-center">Register with us now</h3>
		<div class="col-10" style="margin: 0 auto;">
			<form>
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
					    <label for="inputAge" class="">Age</label>
					    <input type="number" id="inputAge" name="age" class="form-control" required>
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
					<div class="col-sm">
					    <label for="password" class="">Create Password</label>
					    <input type="text" id="password" name="password" class="form-control" required>
					<button class="btn mt-2 w-25 btn-warning" type="button" onclick="genPassword(6)">Generate Password</button>
					</div>
					<span id="showpassword"></span>
					<!--
					<div class="col-12">
					    <label for="inputOccupation" class="">Occupation</label>
					    <input type="text" id="inputOccupation" class="form-control" placeholder="" required>
					</div>
					
					<div class="col-12">
					    <label class="">Have you done a blood donation before?</label>
					    <div class="form-check">
						  <input class="form-check-input" type="radio" name="yesRadio" id="yes">
						  <label class="form-check-label" for="yes">
						    Yes
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="yesRadio" id="no">
						  <label class="form-check-label" for="no">
						    No
						  </label>
						</div>
					</div>
					-->
				</div>
			    <button class="w-100 mt-2 btn btn-primary btn-lg" name="register" type="submit">Register</button>
			</form>
		</div>
	</div>
</body>
</html>