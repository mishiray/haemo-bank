
	<div class="sidenav p-3 text-white bg-purple" style="width: 20vw; min-height: 100vh;">
	  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
	    <span class="fs-4"><?php echo ucwords($userinfo->name); ?> Dashboard</span>
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
	      <a href="edit-profile.php" class="nav-link text-white <?php echo (in_array($sitePage, array('edit-profile.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-user"></i>
	        My Profile
	      </a>
	    </li>
		<li>
	      <a href="compatibility.php" class="nav-link text-white  <?php echo (in_array($sitePage, array('compatibility.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-file"></i>
	        Blood Compatibility Sheet
	      </a>
	    </li>
	    <li>
		<br>
	    </li>
	    <li class="nav-item">
	      <a href="request.php" class="nav-link text-white <?php echo (in_array($sitePage, array('request.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-plus"></i>
	        Request Blood
	      </a>
	    </li>
	    <li class="nav-item">
	      <a href="my-requests.php" class="nav-link text-white <?php echo (in_array($sitePage, array('view-request.php','my-requests.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-tint"></i>
	        My Requests
	      </a>
	    </li>
		<hr class="w-100">
	    <li class="nav-item">
	      <a href="donate.php" class="nav-link text-white <?php echo (in_array($sitePage, array('donate.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-plus"></i>
	        Donate Blood
	      </a>
	    </li>
	    <li>
	      <a href="my-donations.php" class="nav-link <?php echo (in_array($sitePage, array('my-donations.php','view-donation'))) ? 'active' : '' ?> text-white pr-1">
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