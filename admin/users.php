<?php 
	require_once "../base.php";
	$title = "Donors";
	$sql = "SELECT * FROM `userprofile` ORDER BY `date_added` DESC ";
    $result = mysqli_query($conn, $sql);
    $users = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $users[] = $entry;
        }
		if(!empty($users)){
			foreach($users as $value){
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
		<h3 class="text-center">Users</h3>
		<div class="col-10" style="margin: 0 auto;">
			<a type="button" href="./register-recipient.php" class="btn btn-primary" style="display:none; float: right; margin: 30px 0px;"><i class="fa fa-plus pr-1"></i>Add new</a>
			<table>
				<thead>
					<tr>
						<th>SN</th>
						<th>Personal Info</th>
						<th>Blood Data</th>
						<th>Date Registered</th>
						<th></th>
				  </tr>
				</thead>
				<tbody> 
					<?php 
                        if(!empty($users)){
                            $count = 1;
                            foreach($users as $user){
                    ?>       
                        <tr class='odd gradeX'>
                        	<td><?php echo $count++ ?></td>
                            <td> 
								Name: <?php echo ucwords($user->name) ?> <br>		
								Gender: <?php echo ucwords($user->gender) ?> <br>		
								Phone: <?php echo ($user->phone) ?> <br>		
								Email: <?php echo ($user->email) ?>							
							</td>
                            <td>
								Blood Group: <?php echo $user->blood_data->blood_group ?> <br> 
								Blood Type: <?php echo $user->blood_data->blood_type ?> <br> 
							</td>
                            <td><?php echo $user->date_added ?></td>
                            <td class="center">
			        		<?php 
                            	echo "
									<a type='button' href='user-details.php?id=$user->id' class='btn btn-primary'>View</a>
								";
                            ?>
                        	</td>
                        </tr>
                    <?php
                     		}
                    	}else{
							
                            echo "<td colspan=6 class='text-center'>No Users</td>";
                        }
                	?>
				</tbody>
			</table>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>