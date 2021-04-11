<!DOCTYPE html>
<html>
<head>
	<title>Blood Donation Request Page</title>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>
	<div class="container">
		<h3 class="text-center">Make a request</h3>
		<div class="col-8" style="margin: 0 auto;">
			<form>
				<div class="row">
					<div class="col-12">
					    <label for="inputBloodAmount" class="">Blood Amount(ml)</label>
					    <input type="number" id="inputBloodAmount" class="form-control" placeholder="Enter a number from 200-550" min="200" max="550" required>
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