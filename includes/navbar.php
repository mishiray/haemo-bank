
	<div class="topnav maroon" id="myTopnav">
		<a class="navbar-brand active" href="#">Haemo-Bank</a>
		<div class="float-right">
		  <a href="index.php" class="">Home</a>
		  <a href="login.php" class="<?php echo (in_array($sitePage, array('login.php'))) ? 'active' : '' ?>">Login</a>
		  <a href="main-registration.php"  class="<?php echo (in_array($sitePage, array('main-registration.php'))) ? 'active' : '' ?> ">Register</a>
		  <a class="<?php echo (in_array($sitePage, array('aboutus.php'))) ? 'active' : '' ?> " href="aboutus.php">About</a>
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		    <i class="fa fa-bars"></i>
		  </a>
		</div>
	</div>