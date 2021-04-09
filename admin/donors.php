<?php 
	require_once "../config.php";
	$title = "Donors";
?>
<?php include "top.php"?>
<!-- start here-->
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
				    <td><a type="button" href="view-donor.php" class="btn btn-primary">View</a></td>
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
<!-- end here-->
<?php include "buttom.php"?>