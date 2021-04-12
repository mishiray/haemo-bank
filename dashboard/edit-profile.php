<?php 

	//database connection
	require_once "../config.php";

	
	// convert super globals to objects
	$posts = (object)$_POST;

	//check if submit is clicked
	if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["register"])){
		$posts = (object)$_POST;
		$err = 0;
		$fail = '';

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

		$posts->password = base64_encode($posts->password);
		if($err == 0){

			//insert query
			$query = "INSERT INTO `userrofile` (`name`, `phone`, `email`, `address`, `age`, `blood_group`, `password`) VALUES 
										('$posts->name','$posts->phone','$posts->email','$posts->address','$posts->age','$posts->blood_group','$posts->password')";

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
					    <label for="inputAge" class="">Age</label>
					    <input type="number" id="inputAge" name="age" class="form-control" required>
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
			    <button class="w-100 mt-2 btn btn-maroon btn-lg" name="register" type="submit">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>