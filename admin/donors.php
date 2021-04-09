<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
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
	      <a href="#" class="nav-link active pr-1">
	        <i class="fa fa-user-friends"></i>
	        Donors
	      </a>
	    </li>
	    <li>
	      <a href="#" class="nav-link text-white pr-1">
	        <i class="fa fa-tint"></i>
	        Donation Requests
	      </a>
	    </li>
	  </ul>
	</div>
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Donors</h3>
		<div class="col-10" style="margin: 0 auto;">
			<a type="button" href="./register-donor.php" class="btn btn-primary" style="float: right; margin: 30px 0px;"><i class="fa fa-plus pr-1"></i>Add new</a>
			<table>
				  <tr>
				    <th>Id</th>
				    <th>Name</th>
				    <th>Blood Group</th>
				    <th>#</th>
				    <th>#</th>
				  </tr>
				  <tr>
				    <td>1</td>
				    <td>Maria Anders</td>
				    <td>O-</td>
				    <td><a type="button" href="#" class="btn btn-primary">View</a></td>
				    <td><a type="button" href="#" class="btn btn-secondary">Edit</a></td>
				  </tr>
				  <tr>
				    <td>2</td>
				    <td>Francisco Chang</td>
				    <td>AB+</td>
				    <td><a type="button" href="#" class="btn btn-primary">View</a></td>
				    <td><a type="button" href="#" class="btn btn-secondary">Edit</a></td>
				  </tr>
				  <tr>
				    <td>3</td>
				    <td>Roland Mendel</td>
				    <td>B+</td>
				    <td><a type="button" href="#" class="btn btn-primary">View</a></td>
				    <td><a type="button" href="#" class="btn btn-secondary">Edit</a></td>
				  </tr>
			</table>
		</div>
	</div>
</body>
</html>