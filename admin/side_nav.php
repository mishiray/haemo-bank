
	<div class="sidenav p-3 text-white bg-dark" style="width: 20vw; min-height: 100vh;">
	  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
	    <span class="fs-4">Admin Dashboard</span>
	  </a>
	  <ul class="nav nav-pills flex-column mb-auto">
	    <li class="nav-item">
	      <a href="home.php" class="nav-link text-white <?php echo (in_array($sitePage, array('home.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-briefcase"></i>
	        Dashboard
	      </a>
	    </li>
	    <li class="nav-item">
	      <a href="edit-profile.php" class="nav-link text-white <?php echo (in_array($sitePage, array('add-request.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-user"></i>
	        My Profile
	      </a>
	    </li>
		<?php 
			if($userinfo->userrole == 'sudo'){
		?>
			<li class="nav-item">
	      		<a href="users.php" class="nav-link text-white <?php echo (in_array($sitePage, array('users.php','user-details.php'))) ? 'active' : '' ?> pr-1">
					<i class="fa fa-user"></i>
					Manage Users
				</a>
	    	</li>
		<?php
			}
		?>
	    <li>
		<br>
	    </li>
	    <li class="nav-item">
	      <a href="register-donor.php" class="nav-link text-white <?php echo (in_array($sitePage, array('register-donor.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-plus"></i>
	        Register Donor
	      </a>
	    </li>
	    <li class="nav-item">
	      <a href="donors.php" class="nav-link text-white <?php echo (in_array($sitePage, array('donors.php','view-donor.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-user-friends"></i>
	        View Donors
	      </a>
	    </li>
		<hr class="w-100">
	    <li class="nav-item">
	      <a href="register-recipient.php" class="nav-link text-white <?php echo (in_array($sitePage, array('register-recipient.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-plus"></i>
	        Register Recipient
	      </a>
	    </li>
	    <li>
	      <a href="blood-requests.php" class="nav-link <?php echo (in_array($sitePage, array('blood-requests.php'))) ? 'active' : '' ?> text-white pr-1">
	        <i class="fa fa-tint"></i>
	        Blood Requests
	      </a>
	    </li>
	    <li>
		<br>
	    </li>
		<hr class="w-100">
	    <li>
	      <a href="../logout.php" class="nav-link text-white pr-1">
	        <i class="fa fa-arrow-left"></i>
	        Logout
	      </a>
	    </li>
	  </ul>
	</div>