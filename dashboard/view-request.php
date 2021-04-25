<?php 
	require_once "../base.php";
	$title = "View Request";

	//get the id value of request
	$id = ($gets->id) ? $gets->id : '';
	if(!empty($id)){

		//select data from table 
		$sql = "SELECT * FROM `recipients` WHERE `id` = '$id' ";
		//perform query and store in var result
		$result = mysqli_query($conn, $sql);
		if(!empty($result)){
			//create obj of recipient values
			$request =  mysqli_fetch_object($result);
			if(!empty($request->email)){
				$sql = "SELECT * FROM `blood_data` WHERE `email` = '$request->email'";
				$result = mysqli_query($conn, $sql);
				$request->blood_data = mysqli_fetch_object($result);
			}

		}
	}

?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">View request</h3>
		<div class="col-10" style="margin: 0 auto;">
		<?php 
			if(!empty($fail)){
				echo '<div class="info text-center" style="position: absolute; z-index: 99999; vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
			}
		?>
		<?php 
			if(!empty($request)){
		?>
			<div class="row">
				<?php 
					if($request->status == 0){
						echo "
						<div class='col-12'>
							<p>	
								<span>Status: </span>
								<span class='pr-3' style='padding: 10px; width: 60px; border-radius: 5px; color: white; background-color: grey;'>Pending</span>
							</p>
						</div>
						";
					}
					if($request->status == 3){
						echo "
						<div class='col-12'>
							<p>	
								<span>Status: </span>
								<span class='pr-3' style='padding: 10px; width: 65px; border-radius: 5px; color: white; background-color: rgb(63, 182, 59);'>Approved</span>
							</p>
						</div>
						";
					}
				?>
				
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Type:</span>
						<span><?php echo $request->blood_data->blood_type;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Group:</span>
						<span><?php echo $request->blood_data->blood_group;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Amount Needed:</span>
						<span><?php echo $request->blood_amount;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">When is it needed:</span>
						<span><?php echo $request->date_needed;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Purpose:</span>
						<span><?php echo $request->purpose;?></span>
					</p>
				</div>
			</div>
		</div>
		<?php 
			}else{
		?>
			<div class="row">
				Not Found
			</div>
		<?php
			}
		?>
	</div>
<!-- end here-->
<?php include "buttom.php"?>