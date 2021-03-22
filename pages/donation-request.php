<!DOCTYPE html>
<html>
<head>
	<title>Blood Donation Request Page</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="container">
		<h3 class="text-center">Make a donation request</h3>
		<div class="col-8" style="margin: 0 auto;">
			<form>
				<div class="row">
					<div class="col-12">
					    <label for="inputBloodGroup" class="">Blood Group</label>
					    <!-- Default option would be the blood group on user's profile -->
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
					<div class="col-12">
						<label for="inputDate" class="">How soon do you need it?</label>
						<input type="date" id="inputDate" class="form-control" required>
					</div>
					<div class="col-12">
					    <label for="inputPurpose" class="">Purpose</label>
					    <textarea id="inputPurpose" class="form-control" required></textarea>
					</div>
				</div>
			    <button class="w-100 mt-2 btn btn-primary btn-lg" type="submit">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>