<?php 
    require_once '../base.php';
	$title = "Assign Donors to Recipient";

	//get the id value of request
	$id = ($gets->id) ? $gets->id : '';
	if(!empty($id)){
		//select data for recipient from donorecipientr table 
		$sql = "SELECT * FROM `recipients` WHERE `id` = '$id' ";
		//perform query and store in var result
		$result = mysqli_query($conn, $sql);
		$request =  mysqli_fetch_object($result);
		if(!empty($request)){
			//create obj of recipient values
			if(!empty($request->email) && $request->status == 0){
				$sql = "SELECT * FROM `blood_data` WHERE `email` = '$request->email'";
				$result = mysqli_query($conn, $sql);
				$request->blood_data = mysqli_fetch_object($result);
				$blood_group = $request->blood_data->blood_group;
				$blood_type = $request->blood_data->blood_type;

				//select donors that are available givesTo
				$range = givesTo($blood_type);
				$range = implode("', '", $range);
				//$sql = "SELECT d.id as id, d.name as name, b.blood_group as blood_group, b.blood_type as blood_type, d.date_added as date_added FROM `donor` as d INNER JOIN `blood_data` as b ON d.email = b.email WHERE b.blood_type = '$blood_type' AND d.status = 1 ";
				$sql = "SELECT d.id as id, d.name as name, b.blood_group as blood_group, b.blood_type as blood_type, d.date_added as date_added FROM `donor` as d INNER JOIN `blood_data` as b ON d.email = b.email WHERE b.blood_type IN ('$range') AND d.status = 1 ";
				$result = mysqli_query($conn, $sql);
				$donors = [];
				if(!empty($result)){
					while ($entry = mysqli_fetch_object($result)) {
					   $donors[] = $entry;
					}
				}
			}else{
				$fail = 'Not found';
			}
		}
	}else{
		header("Location: home.php");
	}

	//check if assign donor
	if($_SERVER['REQUEST_METHOD'] == 'POST' and $posts->triggers == 'assign_donor'){
                
		$sql = "INSERT INTO `transact` (`recipient_id`,`donor_id`,`status`) VALUES ('$posts->request_id','$posts->donor_id',1)";

		if( mysqli_query($conn, $sql)){
			$fail = "Request has been approved";
			logger($userinfo->email,"assign-donor","transact");
			//update donor and recipient tables
			$sql = "UPDATE `donor` SET `status` = 3 WHERE `id` = '$posts->donor_id' ";
			$sql2 = "UPDATE `recipients` SET `status` = 3 WHERE `id` = '$posts->request_id' ";

			mysqli_query($conn, $sql);
			mysqli_query($conn, $sql2);

		}else{
			$fail = "Error, Try again";
		}
	
	}

?>

<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Donors</h3>
		
		<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
		<div class="col-10" style="margin: 0 auto;">
			<a type="button" href="./register-donor.php" class="btn btn-primary" style="float: right; margin: 30px 0px;"><i class="fa fa-plus pr-1"></i>Add new</a>
			<table>
				<thead>
					<tr>
						<th>SN</th>
						<th>Name</th>
						<th>Blood Type</th>
						<th>Date Donated</th>
						<th></th>
				  </tr>
				</thead>
				<tbody> 
					<?php 
                        if(!empty($donors)){
                            $count = 1;
                            foreach($donors as $donor){
                    ?>       
                        <tr class='odd gradeX'>
                        	<td><?php echo $count++ ?></td>
                            <td> 
								<?php echo ucwords($donor->name) ?> <br>							
							</td>
                            <td><?php echo $donor->blood_type ?></td>
                            <td><?php echo $donor->date_added ?></td>
                            <td class="center">
			        		<?php 
                            	echo "
									<a type='button' href='view-donor.php?id=$donor->id' class='btn btn-primary'>View Donor</a>
								";
                            ?>
                        	</td>
                            <td class="center">
								<form action="" method="post" name="assign_donor" style="padding: 0px !important;">
									<input type="hidden" name="donor_id" value="<?php echo $donor->id ?>">
									<input type="hidden" name="request_id" value="<?php echo $id ?>"> 
									<button type="submit" class='btn btn-maroon' name="triggers" value="assign_donor">Assign</button>
								</form>
                        	</td>
                        </tr>
                    <?php
                     		}
                    	}else{
							
                            echo "<td colspan=6 class='text-center'>No Available Donors</td>";
                        }
                	?>
				</tbody>
			</table>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>