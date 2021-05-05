<?php 
	$title = 'Login';
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

		
	$email = $password = $userrole = "";
	$email_err = $password_err = $userrole_err = "";

	if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["login"])){

		$err = 0;
		$fail = "";

		// Check if email is empty
		if(empty(trim($posts->email))){
			$fail .= "<p>Please enter email.</p>";
			$err++;
		} else{
			$email = strtolower(trim($posts->email));
		}

		// Check if password is empty
		if(empty($posts->password)){
			$fail .= "<p>Please enter your password.</p>";
			$err++;
		} else{
			$password = $posts->password;
		}
		
		// Validate credentials
		if($err == 0){

			//select record from userprofile table
			$sql = "SELECT * FROM `userprofile` WHERE ( `email`= '$email' )";
			
			//perform query with conection
			$result = mysqli_query($conn, $sql);


			if(!empty($result)){
				$data = mysqli_fetch_assoc($result);
				$data = $data ? (object)$data : null;

				if($data->password == base64_encode($password)){
					//begin session
					session_start();
					$userinfo = $data;

					// Store data in session variables
					$_SESSION["loggedin"] = true;                            
					$_SESSION["userinfo"] = $userinfo;

					//log
					logger($posts->email,"logged in","");
					
					// Redirect specified user to welcome page (admin/dashboard)
					if(in_array($data->userrole,array('admin','sudo'))){
						header("location: admin/index.php");
					}elseif($data->userrole == 'client'){
						header("location: dashboard/index.php");
					}

				}else{
					// Display an error message if password is not valid
					$fail .= "<p>The password you entered was not valid.</p>";
				}
			}else{
				// Display an error message if email doesn't exist
				$fail .= "<p>No account found with this email. Please register</p>";
			}				
		}

		// Close connection
		mysqli_close($conn);
	}

?>
<?php include "includes/top.php"?>
<!-- start main coding here -->
	<div class="container justify-content-center">
		<div class="card-box col-6 col-md p-3 ">
			<h3 class="text-center">Login to your account</h3>
			<div class="col-6" style="margin: 0 auto;">
				<form action="" method="POST">
					<div class="row">
						<div class="col-12">
							<label for="inputEmail" class="">Email Address</label>
							<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address" required>
						</div>
						<div class="col-12">
							<label for="inputPassword" class="">Password</label>
							<input type="password" id="inputPassword" name="password" class="form-control" required>
						</div>
					</div>
					<?php 
						if(!empty($fail)){
							echo '<div class="danger" style="vertical-align: middle; width: 100% !important; "><h3>Error Messages</h3> '.$fail.'</div>';
						}
					?>
					<button class="w-100 btn mt-2 btn-maroon btn-lg" name="login" type="submit">Login</button><div class="row">
						<div class="col">
							<p class="mt-2 ">Don't have an account?</p>
							<a href="main-registration.php" class="w-100 btn btn-md danger pb-3">Register Now</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- end main coding here -->
<?php include "includes/buttom.php"?>