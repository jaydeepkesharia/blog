<?php session_start();

//var_dump($_COOKIE['email']);

error_reporting(E_ALL);
include"header2.php";
include"connect.php";



$uid = $_SESSION["uid"];
//var_dump($uid);exit;
if(isset($uid)){
?>

<body>
	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="container">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<div class="col-md-4 col-xs-12 col-sm-4">
					<h4>Filters:-</h4>
					<select name="apply" id='column-select' class="column-select">
					  <option value="">--POST--</option>
					  <option value="php">php</option>
					  <option value="java">java</option>
					  <option value="android">android</option>
					</select>
					<select name="status" id='status-select' class="column-select">
					  <option value="">--STATUS--</option>
					  <option value="Reviewed">Reviewed</option>
					  <option value="Hired">Hired</option>
					  <option value="Rejected">Rejected</option>
					</select>
				</div>

				<div class="col-md-4 col-xs-12 col-sm-4">
					<h2>Candidate Details</h2>
				</div>

				<div class="col-md-4 col-xs-12 col-sm-4">
					<a href="add.php" class="btn btn-info">Add</a> &nbsp;
					<a href="logout.php" class="btn btn-primary">Logout</a>
				</div>
			</div>
			
			<div class="col-md-12 col-xs-12 col-sm-12" >
				<div id="ajaxResult" width="100%" border="1">
					<table border="1" width="100%" id="data">
						<tr>
							<th>Full Name</th>
							<th>Post</th>
							<th>Total Experience</th>
							<th>Current CTC</th>
							<th>Expected CTC</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					<?php 
						
					$ar = mysqli_query($con,"SELECT * FROM `candidate` where user_id='".$uid."'AND is_deleted IS NULL");
					while($row = mysqli_fetch_array($ar)){
							
					?>
						
						
						<tr>
							<td><?php echo $row["firstname"]."&nbsp;".$row["middlename"]."&nbsp;".$row["lastname"]; ?></td>
							<td><?php echo $row["post"];?></td>
							<td><?php echo $row["total_experience"]; ?></td>
							<td><?php echo $row["current"] ;?></td>
							<td><?php echo $row["expected"] ;?></td>
							<td><?php echo $row["status"] ;?></td>
							<td>
								<a href="add.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-pencil"></a>
								<a href="add.php?delete=<?php echo $row['id'];?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"></a>
							</td>
						</tr>
					<?php
					}
					?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php 
		}else{
	?>
	<script type="text/javascript">
		alert('you have to login first');
		location = 'http://localhost/interview_system/signin.php';
	</script>
	<?php
	}	
	?>
	<script type="text/javascript">
		$(".column-select").change(function() {
			//ebugger;
		    var post = $("#column-select").val();
		    var status = $("#status-select").val();
		    $.ajax({
		    	url: "filter.php",
		    	data:{post:post,status:status},
		    	type:'POST',
		    	//dataType: "json",
		    	success: function(result){
		    		console.log(result);
		    		//console.log(1);
		    		//alert(post);
		    		//alert(status);
		    		//alert($('#ajaxResult').html(result));
		    		$('#ajaxResult').html(result);
		    }
		});
	});
	</script>
</body>
</html>

