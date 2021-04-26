<?php 
	require_once "../base.php";
	$title = "Donors";

	//echo in_array('ab-plus',receiversOf('a-plus')) ? "yes" : 'no';

	$sql = "SELECT * FROM `compatibility` ";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $data[] = $entry;
        }
    }


?>

<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Compatibility Sheet</h3>
		<div class="col-10" style="margin: 0 auto;">
			<table>
				<thead>
					<tr>
						<th>SN</th>
						<th>Blood Type</th>
						<th>Gives To</th>
						<th>Receives From</th>
				  </tr>
				</thead>
				<tbody> 
					<?php 
                        if(!empty($data)){
                            $count = 1;
                            foreach($data as $dat){
                    ?>       
                        <tr class='odd gradeX'>
                        	<td><?php echo $count++ ?></td>
                            <td> 
								<?php echo ($dat->blood_type) ?> 							
							</td>
                            <td> 
								<?php echo ($dat->give) ?> 							
							</td>
                            <td> 
								<?php echo ($dat->receive) ?> 							
							</td>
                        </tr>
                    <?php
                     		}
                    	}else{
							
                            echo "<td colspan=6 class='text-center'>No Record</td>";
                        }
                	?>
				</tbody>
			</table>
			
			<?php 
					if(!empty($fail)){
						echo '<div class="info text-center" style="vertical-align: middle; align-self: center; width: 25% !important; top: 140px;">'.$fail.'</div>';
					}
				?>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>