<?php 
	require_once "../config.php";
	$title = "View Request";
?>
<?php include "top.php"?>
<!-- start here-->
	<div class="main p-3 container" style=" min-height: 100vh;">
		<h3 class="text-center">View request</h3>
		<div class="col-10" style="margin: 0 auto;">
			<div class="row">
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">User Id:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Type:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Group:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">Blood Amount Needed:</span>
						<span>Insert here</span>
					</p>
				</div>
				<div class="col-12">
					<p>
						<span class="pr-3" style="font-weight: 600;">When is it needed:</span>
						<span>Insert here</span>
					</p>
				</div>
			</div>
			<div style="margin: 50px auto; text-align: center;">
				<button class="btn btn-primary">Check possible match</button>
				<button class="btn btn-success">Approve</button>
			</div>
		</div>
	</div>
<!-- end here-->
<?php include "buttom.php"?>