<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="container">
		<h3>Register with us now</h3>
		<form>
			<div class="row">
				<div class="col-12">
				    <label for="inputName" class="">Full Name</label>
				    <input type="text" id="inputName" class="form-control" placeholder="Full Name" required>
				</div>
				<div class="col-sm-6">
					<label for="inputPhoneNumber" class="">Phone Number</label>
					<input type="number" id="inputPhoneNumber" class="form-control" placeholder="Phone Number" required>
				</div>
				<div class="col-sm-6">
					<label for="inputEmail" class="">Email Address</label>
					<input type="email" id="inputEmail" class="form-control" placeholder="Email Address" required>
				</div>
				<div class="col-12">
				    <label for="inputAddress" class="">Address</label>
				    <textarea id="inputName" class="form-control" required></textarea>
				</div>
				<div class="col-12">
				    <label for="inputBloodGroup" class="">Blood Group</label>
				    <select class="form-select" id="inputBloodGroup" required>
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
		    <button class="w-100 mt-2 btn btn-primary btn-lg" type="submit">Submit</button>
		</form>
	</div>
</body>
</html>