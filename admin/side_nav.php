
	<div class="sidenav p-3 text-white bg-dark" style="width: 20vw; min-height: 100vh;">
	  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
	    <span class="fs-4">Dashboard</span>
	  </a>
	  <ul class="nav nav-pills flex-column mb-auto">
	    <li class="nav-item">
	      <a href="donors.php" class="nav-link text-white <?php echo (in_array($sitePage, array('donors.php','view-donor.php'))) ? 'active' : '' ?> pr-1">
	        <i class="fa fa-user-friends"></i>
	        Donors
	      </a>
	    </li>
	    <li>
	      <a href="donation-requests.php" class="nav-link <?php echo (in_array($sitePage, array('donation-requests.php'))) ? 'active' : '' ?> text-white pr-1">
	        <i class="fa fa-tint"></i>
	        Donation Requests
	      </a>
	    </li>
	  </ul>
	</div>