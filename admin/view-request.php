<!DOCTYPE html>
<html>
<head>
	<title>View a Request Page</title>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
	<div class="sidenav p-3 text-white bg-dark" style="width: 20vw; min-height: 100vh;">
	  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
	    <span class="fs-4">Dashboard</span>
	  </a>
	  <ul class="nav nav-pills flex-column mb-auto">
	    <li class="nav-item">
	      <a href="donors.php" class="nav-link text-white pr-1">
	        <i class="fa fa-user-friends"></i>
	        Donors
	      </a>
	    </li>
	    <li>
	      <a href="donation-requests.php" class="nav-link active pr-1">
	        <i class="fa fa-tint"></i>
	        Donation Requests
	      </a>
	    </li>
	  </ul>
	</div>
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">View request</h3>
		<div class="col-10" style="margin: 0 auto;">
			<div class="row">
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">User Id:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Type:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Group:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Amount Needed:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">When is it needed:</span>
						<span>Insert here</span>
					</p>
				</div>
			</div>
			<div style="margin: 50px auto; text-align: center;">
				<button class="btn btn-primary">Check possible match</button>
				<button class="btn btn-success">Approve</button>
			</div>
		</div>
	</div>
</body>
</html>