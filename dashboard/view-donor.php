<?php 
	require_once "../base.php";
	$title = "View Donor";

	//get the id value of donor
	$id = ($gets->id) ? $gets->id : '';
	if(!empty($id)){
		//select data for donor from donor table 
		$sql = "SELECT * FROM `donor` WHERE `id` = '$id' ";
		//perform query and store in var result
		$result = mysqli_query($conn, $sql);
		if(!empty($result)){

			//create obj of donor values
			$donor =  mysqli_fetch_object($result);
			if(!empty($donor->email)){
				$sql = "SELECT * FROM `blood_data` WHERE `email` = '$donor->email'";
				$result = mysqli_query($conn, $sql);
				$donor->blood_data = mysqli_fetch_object($result);
			}
			//check if donor has donated before by counting appearance on table
			$sql = "SELECT COUNT(`email`) as num FROM `donor` WHERE `email` = '$donor->email' ";
			$result = mysqli_query($conn, $sql);
			$result =  mysqli_fetch_object($result);
			$donor->count = $result->num;
		}
	}
	
?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">View  donor</h3>
		<div class="col-10" style="margin: 0 auto;">
			
			<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
		<?php 
			if(!empty($donor)){
		?>	
			<div class="row">
				<?php 
					if($donor->status == 0){
						echo "
						<div class='col-12'>
							<p>	
								<span>Status: </span>
								<span class='pr-3' style='padding: 10px; width: 60px; border-radius: 5px; color: white; background-color: grey;'>Pending</span>
							</p>
						</div>
						";
					}
					if($donor->status == 3){
						echo "
						<div class='col-12'>
							<p>	
								<span>Status: </span>
								<span class='pr-3' style='padding: 10px; width: 65px; border-radius: 5px; color: white; background-color: rgb(211, 57, 59);'>Not Available</span>
							</p>
						</div>
						";
					}
				?>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Name:</span>
						<span><?php echo ucwords($donor->name);?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Phone Number:</span>
						<span><?php echo $donor->phone;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Email:</span>
						<span><?php echo $donor->email;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Type:</span>
						<span><?php echo $donor->blood_data->blood_type;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Group:</span>
						<span><?php echo $donor->blood_data->blood_group;?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood amount donated(ml):</span>
						<span><?php echo $donor->blood_amount; ?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Times donor has donated blood</span>
						<span>
							<?php 
								echo $donor->count.' times';
							?>
						</span>
					</p>
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
		<button class='w-50 mt-2 btn btn-success btn-lg' onclick='goBack()'>Back</button>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>