<?php 
	require_once "../base.php";
	$title = "My Blood Requests";
	
	$sql = "SELECT * FROM `recipients` WHERE `email` = '$userinfo->email' ORDER BY `date_added` DESC ";
    $result = mysqli_query($conn, $sql);
    $requests = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $requests[] = $entry;
        }
		if(!empty($requests)){
			foreach($requests as $value){
				if($value->status == 3){
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
		<h3 class="text-center">My Requests</h3>
				<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="position: absolute; z-index: 99999; vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
			<div class="col-10" style="margin: 0 auto;">
				<table>
					  <thead>
						<tr>
							<th>SN</th>
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
									<td>
										<?php echo $count++; ?>
									</td>
									<td>
										<?php echo $req->blood_amount ?>
									</td>
									<td>
									<?php
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
									<td>
										<?php echo $req->date_needed; ?>
									</td>
									<td>
										<?php echo $req->purpose; ?>
									</td>
									<td>
										<?php echo $req->date_added; ?>
									</td>
									<td class="center">
									<?php 
										echo "
											<a type='button' href='view-request.php?id=$req->id' class='btn btn-primary'>View Details</a>
										";
									?>
								</td>
								<td class="center">
									<?php 
										if($req->status == 3){
											echo "
												<a type='button' href='view-donor.php?id=$req->donor_id' class='btn btn-success'>View Donor</a>
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
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>