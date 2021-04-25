<?php 
	require_once "../base.php";
	$title = "My Blood Donations";
	
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
								</tr>
							<?php
									}
								}else{
									
									echo "<td colspan=8	 class='text-center'>No Donations</td>";
								}
							?>
					  </tbody>
				</table>
			</div>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>