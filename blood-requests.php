<?php 
	require_once "../config.php";
	$title = "Blood Recipient Requests";

?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Blood Recipient Requests</h3>
		
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
					  <thead>
						<tr>
							<th>SN</th>
							<th>Gender</th>
							<th>Blood Group</th>
							<th>Blood Amount</th>
							<th>Status</th>
							<th>Date Needed</th>
							<th>Date Added</th>
							<th colspan="2">#</th>
						</tr>
					  </thead>
					  <tbody>
					  	
							<?php 
								if(!empty($requests)){
									$count = 1;
									foreach($requests as $req){
							?>       
								<tr class='odd gradeX'>
									<td><?php echo $count++ ?></td>
									<td> 
										<?php echo ucwords($req->name) ?> <br>							
									</td>
									<td><?php echo $req->gender ?></td>
									<td><?php echo $req->blood_data->blood_group ?></td>
									<td><?php echo $req->amount ?></td>
									<td><?php
											if($req->status == 0){
												echo "
													<div style='padding: 10px; width: 60px; border-radius: 5px; color: white; background-color: grey;'>
														Pending
													</div>
												";
											}elseif($req->status == 3){
												echo "
													<div style='padding: 10px; width: 65px; border-radius: 5px; color: white; background-color: rgb(63, 182, 59);'>
														Approved
													</div>
												";
											}
										?>
									</td>
									<td><?php echo $req->date_needed ?></td>
									<td><?php echo $req->date_added ?></td>
									<td class="center">
										<?php 
											echo "
												<a type='button' href='view-request.php?id=$req->id' class='btn btn-primary'>View Details</a>
											";
										?>
									</td>
									<td class="center">
										<?php 
											echo "
												<a type='button' href='assign-donor.php?id=$req->id' class='btn btn-primary'>Assign & Approve</a>
											";
										?>
									</td>
								</tr>
							<?php
									}
								}else{
									
									echo "<td colspan=6 class='text-center'>No Requests</td>";
								}
							?>
					  </tbody>
					  <tr>
					    <td>2</td>
					    <td>AB+</td>
						<td></td>
					    <td><div style="padding: 10px; width: 65px; border-radius: 5px; color: white; background-color: rgb(63, 182, 59);">Approved</div></td>
					    <td></td>
					    <td><a type="button" href="#" class="btn btn-primary">View Details</a></td> <br>
					    <td><a type="button" href="#" class="btn btn-primary">Assign & Approve</a></td>
					  </tr>
					  <tr>
					    <td>3</td>
					    <td>B+</td>
						<td></td>
					    <td><div style="padding: 10px; width: 65px; border-radius: 5px; color: white; background-color: rgb(63, 182, 59);">Approved</div></td>
					    <td></td>
					    <td><a type="button" href="#" class="btn btn-primary">View Details</a></td> <br>
					    <td><a type="button" href="#" class="btn btn-primary">Assign & Approve</a></td>
					  </tr>
				</table>
			</div>
			<div id="approved" style="display: none;">
				<table>
					  <tr>
					    <th>Donor Id</th>
					    <th>Blood Group</th>
					    <th>Date approved</th>
						<th>#</th>
					  </tr>
					  <tr>
					    <td>1</td>
					    <td>O-</td>
					    <td>11-03-2021</td>
					    <td><a type="button" href="#" class="btn btn-primary">View Details</a></td>
					  </tr>
				</table>
			</div>
			<div id="pending" style="display: none;">
				<table>
					  <tr>
					    <th>Recipient Id</th>
					    <th>Blood Group</th>
					    <th>Blood Amount</th>
					    <th>How urgent is it</th>
					    <th colspan="2">#</th>
					  </tr>
					  <tr>
					    <td>1</td>
					    <td>O-</td>
					    <td>23-04-2021</td>
						<td></td>
					    <td><a type="button" href="#" class="btn btn-primary">View Details</a></td> <br>
					    <td><a type="button" href="#" class="btn btn-primary">Assign & Approve</a></td>
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
<!-- end here-->
<?php include "buttom.php"?>