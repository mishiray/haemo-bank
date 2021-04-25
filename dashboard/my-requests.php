<?php 
	require_once "../base.php";
	$title = "My Blood Requests";
	
	$sql = "SELECT * FROM `recipients` WHERE `email` = ORDER BY `date_added` DESC ";
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
									
									</td>
									<td>
									
									</td>
									<td>
									
									</td>
									<td>
									
									</td>
									<td>
									
									</td>
									<td>
									
									</td>
									<td>
									
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