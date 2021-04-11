<?php 
	require_once "../config.php";
	$title = "Donors";
	$sql = "SELECT * FROM `donor` ORDER BY `date_added` DESC ";
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
		<h3 class="text-center">Donors</h3>
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
                            <td><?php echo $donor->blood_details ?></td>
                            <td><?php echo $donor->status ?></td>
                            <td><?php echo $donor->date_added ?></td>
                            <td class="center">
			        		<?php 
                            	echo "
									<a type='button' href='view-donor.php?id=$donor->id' class='btn btn-primary'>View</a>
								";
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