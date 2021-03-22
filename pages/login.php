<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="container">
		<h3 class="text-center">Login to your account</h3>
		<div class="col-8" style="margin: 0 auto;">
			<form>
				<div class="row">
					<div class="col-12">
					    <label for="inputEmail" class="">Email Address</label>
						<input type="email" id="inputEmail" class="form-control" placeholder="Email Address" required>
					</div>
					<div class="col-12">
						<label for="inputPassword" class="">Password</label>
						<input type="password" id="inputPassword" class="form-control" required>
					</div>
				</div>
			    <button class="w-100 mt-2 btn btn-primary btn-lg" type="submit">Login</button>
			</form>
		</div>
	</div>
</body>
</html>