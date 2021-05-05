<?php 
	require_once "../base.php";
	$title = "My Blood Donations";
	
	$sql = "SELECT * FROM `donor` WHERE `email` = '$userinfo->email' ORDER BY `date_added` DESC ";
    $result = mysqli_query($conn, $sql);
    $donors = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $donors[] = $entry;
        }
    }

?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">My Donations</h3>
		
		
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
							<th>Date Added</th>
							<th colspan="2">#</th>
						</tr>
					  </thead>
					  <tbody>
							<?php 
								if(!empty($donors)){
									$count = 1;
									foreach($donors as $donor){
							?>       
								<tr class='odd gradeX'>
									<td>
										<?php echo $count++; ?>
									</td>
									<td>
										<?php echo $donor->blood_amount; ?>
									</td>
									<td>
										<?php
											if($donor->status == 0){
												echo "NOT TESTED";
											}
											elseif($donor->status == 1){
												echo "OKAY - AVAILABLE";
											}elseif($donor->status == 3){
												echo "Not Available";
											}
										?>
									</td>
									<td>
										<?php echo $donor->date_added; ?>
									</td>
									<td class="center">
										<?php 
											echo "
												<a type='button' href='view-donation.php?id=$donor->id' class='btn btn-primary'>View</a>
											";
										?>
                        			</td>
								</tr>
							<?php
									}
								}else{
									
									echo "<td colspan=8	 class='text-center'>No Donations</td>";
								}
							?>
					  </tbody>
				</table>
			<button class='w-50 mt-2 btn btn-success btn-lg' onclick='goBack()'>Back</button>
			</div>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>