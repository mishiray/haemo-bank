<?php 
	$title = 'Main Registration';

	//login function for php
	session_start();
	

	// Check if the user is already logged in, if yes then redirect him to the dashboard page
	if(isset($sessions->loggedin) && $sessions->loggedin === true){
		//redirect to admin or dashboard
		$location = ($userinfo->userrole == 'admin') ? 'admin' : 'dashboard';
		header("Location: $location");
		exit;
	}

	//database connection
	require_once "config.php";

		
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
			$result = mysqli_fetch_object($result);
			if(!empty($result)){
				$fail .= "<p>Please Login. User already exists</p>";
				$err++;
			}
		}

		$posts->password = base64_encode($posts->password);
		if($err == 0){

			//insert query for login
			$query = "INSERT INTO `userprofile` (`name`,`gender` ,`phone`, `email`, `address`, `dob`, `userrole`, `password`) VALUES 
										('$posts->name','$posts->gender','$posts->phone','$posts->email','$posts->address','$posts->dob','client','$posts->password')";

			if(mysqli_query($conn, $query)){
				$fail .= "<p>You have successfully registered. Please login</p>";

				//insert query to add blood data

				//check if blood data with email exists
				$sql = "SELECT * FROM `blood_data` WHERE `email` = '$posts->email' ";
				//perform query 
				$result = mysqli_query($conn, $sql);
				if(!empty($result)){
					$query = "UPDATE `blood_data` SET `blood_group` = '$posts->blood_group', `blood_type` = '$posts->blood_type' WHERE `email` = '$posts->email'";
					mysqli_query($conn, $query);
				}else{
					$query2 = "INSERT INTO `blood_data` (`email`,`blood_group`, `blood_type`,`status`) VALUES 
					('$posts->email','$posts->blood_group','$posts->blood_type',1)";
					mysqli_query($conn, $query2);
				}

			}else{
				$fail .= "<p> Unable to register. Please try again <br> ".mysqli_error($conn)."</p>";

			}


		}

	}

?>
<?php include "includes/top.php"?>
<!-- start main coding here -->
<div class="card-box col-12">
	<div class="container">
		<h3 class="text-center">Register with us now</h3>
		<div class="col-8" style="margin: 0 auto;">
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
					    <label for="inputDob" class="">Date of Birth</label>
					    <input type="date" id="inputDob" name="dob" class="form-control" required>
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
					<div class="col-sm">
					    <label for="password" class="">Create Password</label>
					    <input type="text" id="password" name="password" class="form-control" required>
					<button class="btn mt-2 w-25 btn-warning" type="button" onclick="genPassword(6)">Generate Password</button>
					</div>
				</div>
				<?php 
					if(!empty($fail)){
						echo '<div class="danger text-center" style="position: absolute; z-index: 99999; vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
			    <button class="w-100 mt-2 btn btn-maroon btn-lg" name="register" type="submit">Register</button>
				<div class="row">
					<div class="col">
						<p class="mt-2 ">Already have an account?</p>
						<a href="login.php" class="w-100 btn btn-md danger">Login</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end main coding here -->
<?php include "includes/buttom.php"?>