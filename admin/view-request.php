<?php 
	require_once "../config.php";
	$title = "View Request";

	//get the id value of request
	$id = ($gets->id) ? $gets->id : '';
	if(!empty($id)){
		//select data for donor from donor table 
		$sql = "SELECT * FROM `recipient` WHERE `id` = '$id' ";
		//perform query and store in var result
		$result = mysqli_query($conn, $sql);
		if(!empty($result)){

			//create obj of donor values
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
			if(!empty($donor)){
		?>
			<div class="row">
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Name:</span>
						<span><?php echo "$request->name";?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Gender:</span>
						<span><?php echo "$request->gender";?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Date of Birth:</span>
						<span><?php echo "$request->dob";?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Address:</span>
						<span><?php echo "$request->address";?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Type:</span>
						<span><?php echo "$request->blood_data->blood_type";?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Group:</span>
						<span><?php echo "$request->blood_data->blood_group";?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Amount Needed:</span>
						<span><?php echo "$request->blood_amount";?></span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">When is it needed:</span>
						<span><?php echo "$request->date_needed";?></span>
					</p>
				</div>
			</div>
			<div style="margin: 50px auto; text-align: center;">
				<?php 
					if($request->status == 0){
						echo "
							<a type='button' href='assign-donor.php?id=$request->id' class='btn btn-primary'>Check Possible Match</a>
						";
					}
				?>
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