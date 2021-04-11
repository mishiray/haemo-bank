<!DOCTYPE html>
<html>
<head>
	<title>Donation Requests</title>
	<link rel="stylesheet" type="text/css" href="../includes/style.css">
	<!-- Font awesome -->
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
		<h3 class="text-center">Donation requests</h3>
		
		<div class="col-10" style="margin: 0 auto;">
			<ul class="nav nav-pills nav-fill">
			  <li class="nav-item">
			    <a class="nav-link active" id="allLink" href="#" onclick="allOnClick()">All</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="penLink" href="#" onclick="pendingOnClick()">Pending</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="appLink" href="#" onclick="approvedOnClick()">Approved</a>
			  </li>
			</ul>
			<br />
			<div id="all">
				<table>
					  <tr>
					    <th>Donor Id</th>
					    <th>Blood Group</th>
					    <th>Status</th>
					    <th>#</th>
					  </tr>
					  <tr>
					    <td>1</td>
					    <td>O-</td>
					    <td><div style="padding: 10px; width: 60px; border-radius: 5px; color: white; background-color: grey;">Pending</div></td>
					    <td><a type="button" href="#" class="btn btn-primary">View</a></td>
					  </tr>
					  <tr>
					    <td>2</td>
					    <td>AB+</td>
					    <td><div style="padding: 10px; width: 65px; border-radius: 5px; color: white; background-color: rgb(63, 182, 59);">Approved</div></td>
					    <td></td>
					  </tr>
					  <tr>
					    <td>3</td>
					    <td>B+</td>
					    <td><div style="padding: 10px; width: 65px; border-radius: 5px; color: white; background-color: rgb(63, 182, 59);">Approved</div></td>
					    <td></td>
					  </tr>
				</table>
			</div>
			<div id="approved" style="display: none;">
				<table>
					  <tr>
					    <th>Donor Id</th>
					    <th>Blood Group</th>
					    <th>Date approved</th>
					  </tr>
					  <tr>
					    <td>1</td>
					    <td>O-</td>
					    <td>11-03-2021</td>
					  </tr>
					  <tr>
					    <td>2</td>
					    <td>AB+</td>
					    <td>11-03-2021</td>
					  </tr>
					  <tr>
					    <td>3</td>
					    <td>B+</td>
					    <td>11-03-2021</td>
					  </tr>
				</table>
			</div>
			<div id="pending" style="display: none;">
				<table>
					  <tr>
					    <th>Donor Id</th>
					    <th>Blood Group</th>
					    <th>How urgent is it</th>
					    <th>#</th>
					  </tr>
					  <tr>
					    <td>1</td>
					    <td>O-</td>
					    <td>23-04-2021</td>
					    <td><a type="button" href="#" class="btn btn-primary">View</a></td>
					  </tr>
					  <tr>
					    <td>2</td>
					    <td>AB+</td>
					    <td>02-06-2021</td>
					    <td><a type="button" href="#" class="btn btn-primary">View</a></td>
					  </tr>
					  <tr>
					    <td>3</td>
					    <td>B+</td>
					    <td>15-04-2021</td>
					    <td><a type="button" href="#" class="btn btn-primary">View</a></td>
					  </tr>
				</table>
			</div>

		</div>
	</div>
	<script type="text/javascript">
		var all = document.getElementById('all');
		var approved = document.getElementById('approved');
		var pending = document.getElementById('pending');
		var allLink = document.getElementById('allLink');
		var appLink = document.getElementById('appLink');
		var penLink = document.getElementById('penLink');

		function allOnClick() {
			all.style.display = 'block';
			approved.style.display = 'none';
			pending.style.display = 'none';
			allLink.classList.add("active");
			penLink.classList.remove("active");
			appLink.classList.remove("active");
		}

		function pendingOnClick() {
			all.style.display = 'none';
			approved.style.display = 'none';
			pending.style.display = 'block';
			penLink.classList.add("active");
			allLink.classList.remove("active");
			appLink.classList.remove("active");
		}

		function approvedOnClick() {
			all.style.display = 'none';
			approved.style.display = 'block';
			pending.style.display = 'none';
			appLink.classList.add("active");
			allLink.classList.remove("active");
			penLink.classList.remove("active");

		}
	</script>
</body>

</html>