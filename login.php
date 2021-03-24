<?php 
	//login function for php
	session_start();
	
	// convert super globals to objects
	$sessions = (object)$_SESSION;
	$posts = (object)$_POST;

	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(isset($sessions->loggedin) && $sessions->loggedin === true){
		//redirect to admin or dashboard
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
			$password = $posts->email;
		}
		
		// Validate credentials
		if($err == 0){

			//select record from userprofile table
			$sql = "SELECT `password`, `userrole`, `email` FROM `userprofile` WHERE ( `email`= '$email' )";
			
			//perform query with conection
			$result = mysqli_query($conn, $sql);


			if(!empty($result)){
				$data = mysqli_fetch_assoc($result);
				$data = $data ? (object)$data : null;

				if($data->password==base64_encode($password) ){
					//begin session
					session_start();
					$userinfo = $data;

					// Store data in session variables
					$_SESSION["loggedin"] = true;                            
					$_SESSION["userinfo"] = $userinfo;

					// Redirect specified user to welcome page (admin/dashboard)
					if($data->userrole == 'admin'){
						header("location: admin/index.php");
					}elseif($data->userrole == 'dashboard'){
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
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<script src="includes/script.js"></script>

</head>
<body>
	<?php include "navbar.php"?>
	<div class="container">
		<h3 class="text-center">Login to your account</h3>
		<div class="col-8" style="margin: 0 auto;">
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
                        echo '<div class="danger" style="vertical-align: middle; align-self: center; width: 50% !important; "><h3>Error Messages</h3> '.$fail.'</div>';
                    }
                ?>
			    <button class="w-100 btn mt-2 btn-primary btn-lg" name="login" type="submit">Login</button>
			</form>
		</div>
	</div>
</body>
</html>