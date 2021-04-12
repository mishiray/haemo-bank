<?php 
	require_once "../base.php";
	$title = "Donors";
	$sql = "SELECT * FROM `donor` ORDER BY `date_added` DESC ";
    $result = mysqli_query($conn, $sql);
    $donors = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $donors[] = $entry;
        }
		if(!empty($donors)){
			foreach($donors as $value){
				if(!empty($value->email)){
					$sql = "SELECT * FROM `blood_data` WHERE `email` = '$value->email'";
					$result = mysqli_query($conn, $sql);
					$value->blood_data = mysqli_fetch_object($result);
				}
			}
		}
    }

	
	//check if assign donor
	if($_SERVER['REQUEST_METHOD'] == 'POST' and $post->triggers == 'approve_donor'){
                
		$sql = "UPDATE TABLE `donor` SET `status` = 1 WHERE `id` = '$posts->donor_id' ";
		if(mysqli_query($conn, $sql)){
			$fail = "Donor has been approved";
		
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
						echo '<div class="info text-center" style="position: absolute; z-index: 99999; vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
		<div class="col-10" style="margin: 0 auto;">
			<a type="button" href="./register-donor.php" class="btn btn-primary" style="float: right; margin: 30px 0px;"><i class="fa fa-plus pr-1"></i>Add new</a>
			<table>
				<thead>
					<tr>
						<th>SN</th>
						<th>Name</th>
						<th>Blood Data</th>
						<th>Status</th>
						<th>Date</th>
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
                            <td>
								Blood Group: <?php echo $donor->blood_data->blood_group ?> <br> 
								Blood Type: <?php echo $donor->blood_data->blood_type ?> <br> 
								
							</td>
                            <td><?php
									if($donor->status == 0){
										echo "NOT TESTED";
									}
									elseif($donor->status == 1){
										echo "OKAY - AVAILABLE";
									}elseif($donor->status == 3){
										echo "Not Available";
									}
								?></td>
                            <td><?php echo $donor->date_added ?></td>
                            <td class="center">
			        		<?php 
                            	echo "
									<a type='button' href='view-donor.php?id=$donor->id' class='btn btn-primary'>View</a>
								";
                            ?>
                        	</td>
							<td>
								<?php
									if($donor->status == 0){
									?>
										<form action="" method="post" name="approve_donor">
											<input type="hidden" name="donor_id" value="<?php echo $donor->id ?>">
											<button type="submit" class='btn btn-info' name="triggers" value="approve_donor">Approve</button>
										</form>
								<?php
									}
								?>
							</td>
                        </tr>
                    <?php
                     		}
                    	}else{
							
                            echo "<td colspan=6 class='text-center'>No Donors</td>";
                        }
                	?>
				</tbody>
			</table>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>