
	<div class="sidenav p-3 text-white bg-purple" style="width: 20vw; min-height: 100vh;">
	  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
	    <span class="fs-4">Client Dashboard</span>
	  </a>
	  <ul class="nav nav-pills flex-column mb-auto">
	    <li class="nav-item">
	      <a href="home.php" class="nav-link text-white <?php echo (in_array($sitePage, array('home.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-briefcase"></i>
	        Dashboard
	      </a>
	    </li>
	    </li>
	    <li class="nav-item">
	      <a href="edit-profile.php" class="nav-link text-white <?php echo (in_array($sitePage, array('add-request.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-user"></i>
	        My Profile
	      </a>
	    </li>
	    <li>
		<br>
	    </li>
	    <li class="nav-item">
	      <a href="register-donor.php" class="nav-link text-white <?php echo (in_array($sitePage, array('add-request.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-plus"></i>
	        Request Blood
	      </a>
	    </li>
	    <li class="nav-item">
	      <a href="donors.php" class="nav-link text-white <?php echo (in_array($sitePage, array('requests.php','view-donor.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-tint"></i>
	        My Requests
	      </a>
	    </li>
		<hr class="w-100">
	    <li class="nav-item">
	      <a href="register-recipient.php" class="nav-link text-white <?php echo (in_array($sitePage, array('add-donate.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-plus"></i>
	        Donate Blood
	      </a>
	    </li>
	    <li>
	      <a href="blood-requests.php" class="nav-link <?php echo (in_array($sitePage, array('donations.php'))) ? 'active' : '' ?> text-white pr-1">
	        <i class="fa fa-tint"></i>
	        My Donations
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