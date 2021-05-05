<?php 
	require_once "../base.php";
	$title = "Logs";

	$sql = "SELECT * FROM `log` ORDER BY `id` DESC ";
    $result = mysqli_query($conn, $sql);
    $logs = [];
    if(!empty($result)){
        while ($entry = mysqli_fetch_object($result)) {
           $logs[] = $entry;
        }
    }

?>

<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">Logs</h3>
		<div class="col-10" style="margin: 0 auto;">
			<table>
				<thead>
					<tr>
						<th>SN</th>
						<th>User</th>
						<th>Activity</th>
						<th>Date</th>
				  </tr>
				</thead>
				<tbody> 
					<?php 
                        if(!empty($logs)){
                            $count = 1;
                            foreach($logs as $log){
                    ?>       
                        <tr class='odd gradeX'>
                        	<td><?php echo $count++ ?></td>
                            <td> 
								<?php echo $log->email ?>							
							</td>
                            <td>
								<?php echo $log->activity ?>
							</td>
                            <td><?php echo $log->date_added ?></td>
                        </tr>
                    <?php
                     		}
                    	}else{
							
                            echo "<td colspan=6 class='text-center'>No Log</td>";
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