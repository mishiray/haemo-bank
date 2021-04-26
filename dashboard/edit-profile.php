<?php 

	//database connection
	require_once "../base.php";
	$title = "Edit Profile";
	
	// convert super globals to objects
	
	$select = "SELECT * FROM `blood_data` WHERE `email` = '$userinfo->email'";
	$result = mysqli_query($conn, $select); 
	if(!empty($result)){
		//create obj of recipient values
		$blood_data =  mysqli_fetch_object($result);
	}

	//check if submit is clicked
	if($_SERVER["REQUEST_METHOD"] == "POST" and isset ($_POST["triggers"]) and $posts->triggers == 'edit_profile')
	 {
		$err = 0;
		$fail = '';


		if($err == 0){

			//insert query
			$query1 = "UPDATE `userprofile` SET `name` = '$posts->name' , `phone` = '$posts->phone', `gender` = '$posts->gender', `address` = '$posts->address', `dob` = '$posts->dob' WHERE `email` = '$userinfo->email'"; 
			
			//check if blood data with email exists
			$sql = "SELECT * FROM `blood_data` WHERE `email` = '$userinfo->email' ";
			//perform query 
			$result = mysqli_fetch_object(mysqli_query($conn, $sql));
			if(!empty($result)){
				$query2 = "UPDATE `blood_data` SET `blood_group` = '$posts->blood_group', `blood_type` = '$posts->blood_type' WHERE `email` = '$userinfo->email'";
			}else{
				$query2 = "INSERT INTO `blood_data` (`email`,`blood_group`, `blood_type`,`status`) VALUES 
				('$userinfo->email','$posts->blood_group','$posts->blood_type',1)";
			}

			if(mysqli_query($conn, $query1) and mysqli_query($conn, $query2)){
				$sql = "SELECT * FROM `userprofile` WHERE `email` = '$userinfo->email' ";
				$user_data = mysqli_fetch_object(mysqli_query($conn, $sql));                    
				$_SESSION["userinfo"] = $user_data;
				$fail .= "<p>You have successfully updated your profile</p>";

			}else{
				$fail .= "<p> Unable to update.".mysqli_error($conn)."</p>";

			}


		}

	}
?>
	<?php include "top.php"?>
	<div class="main p-3 container">
		<h3 class="text-center">Edit Profile</h3>
		<div class="col-10" style="margin: 0 auto;">
			<form method="POST" >
				<div class="row">
					<div class="col-12">
					    <label for="inputName" class="">Full Name</label>
					    <input type="text" id="inputName" name="name" value="<?php echo $userinfo->name ?>" class="form-control" placeholder="Full Name" required>
					</div>
					<div class="col-sm">
						<label for="inputPhoneNumber" class="">Phone Number</label>
						<input type="tel" id="inputPhoneNumber" name="phone" class="form-control" value="<?php echo $userinfo->phone ?>" placeholder="Phone Number" required>
					</div>
					<div class="col-sm">
						<label for="inputEmail" class="">Email Address</label>
						<input type="email" id="inputEmail" name="email" class="form-control" value="<?php echo $userinfo->email ?>" readonly placeholder="Email Address" required>
					</div>
					<div class="col-12">
					    <label for="inputAddress" class="">Address</label>
					    <textarea id="inputName" name="address" class="form-control"><?php echo $userinfo->address ?></textarea>
					</div>
					<div class="col-sm">
					    <label for="inputGender" class="">Gender</label>
					    <select class="form-select" id="inputGender" name="gender" required>
			                <option value="">Choose...</option>
			                <option <?php echo ($userinfo->gender == 'male' )? 'selected' : '' ?> value="male">Male</option>
			                <option  <?php echo ($userinfo->gender == 'female' )? 'selected' : '' ?> value="female">Female</option>
			            </select>
					</div>
					<div class="col-sm">
					    <label for="inputAge" class="">Date of Birth</label>
					    <input type="date" id="inputAge" name="dob" class="form-control" value="<?php echo $userinfo->dob ?>" required>
					</div>
					<div class="col-sm">
					    <label for="inputBloodGroup" class="">Blood Group</label>
					    <select class="form-select" id="inputBloodGroup" name="blood_group" required>
			                <option value="">Choose...</option>
			                <option  <?php echo (!empty($blood_data)) ? ($blood_data->blood_group == 'o')? 'selected' : '' : '' ?> value="o">O</option>
			                <option  <?php echo (!empty($blood_data)) ? ($blood_data->blood_group == 'a')? 'selected' : '' : ''?> value="a">A</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_group ==  'b')? 'selected' : '' : '' ?> value="b">B</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_group == 'ab')? 'selected' : '' : ''?> givalue="ab">AB</option>
			            </select>
					</div>
					<div class="col-sm">
					    <label for="inputBloodType" class="">Blood Type</label>
					    <select class="form-select" id="inputBloodType" name="blood_type" required>
			                <option value="">Choose...</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_type == 'o-plus') ? 'selected' : '' : ''?> value="o-plus">O+</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_type == 'o-minus') ? 'selected' : '' : ''?> value="o-minus">O-</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_type == 'a-plus') ? 'selected' : '' : '' ?> value="a-plus">A+</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_type == 'a-minus') ? 'selected' : ''  : ''?> value="a-minus">A-</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_type == 'b-plus') ? 'selected' : ''  : ''?> value="b-plus">B+</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_group == 'b-minus') ? 'selected' : ''  : ''?> value="b-minus">B-</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_group == 'ab-plus') ? 'selected' : ''  : ''?> value="ab-plus">AB+</option>
			                <option <?php echo (!empty($blood_data)) ? ($blood_data->blood_group == 'ab-minus') ? 'selected' : ''  : ''?> value="ab-minus">AB-</option>
			            </select>
					</div>
				</div>
		<?php 
			if(!empty($fail)){
				echo '<div class="info text-center" style="vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
			}
		?>
			    <button class="w-50 mt-2 btn btn-maroon btn-lg" name ='triggers' value="edit_profile" type="submit">Submit</button>
			</form>
		</div>
	</div>
<?php include 'buttom.php';