<?php 
	require_once "../base.php";
	$title = "Blood Recipient Requests";
	
	$sql = "SELECT * FROM `recipients` ORDER BY `date_added` DESC ";
    $result = mysqli_query($conn, $sql);
    $requests = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $requests[] = $entry;
        }
		if(!empty($requests)){
			foreach($requests as $value){
				if(!empty($value->email)){
					$sql = "SELECT * FROM `blood_data` WHERE `email` = '$value->email'";
					$result = mysqli_query($conn, $sql);
					$value->blood_data = mysqli_fetch_object($result);
				}
			}
		}
    }

	$sql = "SELECT * FROM `recipients` WHERE `status` = 0 ORDER BY `date_added` DESC ";
    $result = mysqli_query($conn, $sql);
    $pending_requests = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $pending_requests[] = $entry;
        }
		if(!empty($pending_requests)){
			foreach($pending_requests as $value){
				if(!empty($value->email)){
					$sql = "SELECT * FROM `blood_data` WHERE `email` = '$value->email'";
					$result = mysqli_query($conn, $sql);
					$value->blood_data = mysqli_fetch_object($result);
				}
			}
		}
    }

	//Approved requests
	$sql = "SELECT * FROM `recipients` WHERE `status` = 3 ORDER BY `date_added` DESC ";
    $result = mysqli_query($conn, $sql);
    $approved_requests = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $approved_requests[] = $entry;
        }
		if(!empty($approved_requests)){
			foreach($approved_requests as $value){
				if(!empty($value->email)){
					$sql = "SELECT * FROM `blood_data` WHERE `email` = '$value->email'";
					$result = mysqli_query($conn, $sql);
					$value->blood_data = mysqli_fetch_object($result);
				}
				if(!empty($value->token)){
					$sql = "SELECT * FROM `transact` WHERE transact.token = '$value->token'";
					$result = mysqli_query($conn, $sql);
					$transact = mysqli_fetch_object($result);
					$value->donor_id  = $transact->donor_id;
				}
			}
		}
    }


?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Blood Recipient Requests</h3>
		
		
				<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="position: absolute; z-index: 99999; vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
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
							<th>Name</th>
							<th>Blood Group</th>
							<th>Blood Amount</th>
							<th>Status</th>
							<th>Date Needed</th>
							<th>Purpose</th>
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
										<?php echo ucwords($req->name) ?>							
									</td>
									<td><?php echo (!empty($req->blood_data)) ? $req->blood_data->blood_group : ''?></td>
									<td><?php echo $req->blood_amount ?></td>
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
									<td><?php echo $req->purpose ?></td>
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
											if($req->status == 0){
												echo "
													<a type='button' href='assign-donor.php?id=$req->id' class='btn btn-primary'>Assign & Approve</a>
												";
											}
										?>
									</td>
								</tr>
							<?php
									}
								}else{
									
									echo "<td colspan=8	 class='text-center'>No Requests</td>";
								}
							?>
					  </tbody>
				</table>
			</div>
			<div id="approved" style="display: none;">
				<table>
					<thead>
					  <tr>
					    <th>SN</th>
						<th>Name</th>
						<th>Blood Group</th>
						<th>Blood Amount</th>
					    <th>Date Approved</th>
						<th>#</th>
					  </tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($approved_requests)){
								$count = 1;
								foreach($approved_requests as $req){
						?>       
							<tr class='odd gradeX'>
								<td><?php echo $count++ ?></td>
								<td> 
									<?php echo ucwords($req->name) ?> 							
								</td>
								<td><?php echo (!empty($req->blood_data)) ?  $req->blood_data->blood_group : ''?></td>
								<td><?php echo $req->blood_amount ?></td>
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
											<a type='button' href='view-donor.php?id=$req->donor_id' class='btn btn-success'>View Donor</a>
										";
									?>
								</td>
								</tr>
							<?php
								}
							}else{
								echo "<td colspan=6 class='text-center'>No Approved Requests</td>";
							}
							?>
					</tbody>
				</table>
			</div>
			<div id="pending" style="display: none;">
				<table>
					<thead>
						<tr>
							<th>SN</th>
							<th>Name</th>
							<th>Blood Group</th>
							<th>Blood Amount</th>
							<th>Date Needed</th>
							<th>Purpose</th>
							<th colspan="2">#</th>
						</tr>
					</thead>
					<tbody>
					<?php 
							if(!empty($pending_requests)){
								$count = 1;
								foreach($pending_requests as $req){
						?>       
							<tr class='odd gradeX'>
								<td><?php echo $count++ ?></td>
								<td> 
									<?php echo ucwords($req->name) ?> 							
								</td>
								<td><?php echo $req->blood_data->blood_group ?></td>
								<td><?php echo $req->blood_amount ?></td>
								<td><?php echo $req->date_needed ?></td>
								<td><?php echo $req->purpose ?></td>
								<td class="center">
									<?php 
										echo "
											<a type='button' href='view-request.php?id=$req->id' class='btn btn-primary'>View Details</a>
										";
									?>
								</td>
								<td>
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
								echo "<td colspan=6 class='text-center'>No Pending Requests</td>";
							}
							?>
				
					</tbody>
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