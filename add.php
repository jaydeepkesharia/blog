<?php 
session_start();
error_reporting(E_ALL);
include"header2.php"; 
include"connect.php";


$uid =$_SESSION["uid"];
if(isset($uid)){
	
	if(isset($_REQUEST["delete"])){
		
		$deleted = date("Y-m-d H:i:s");
		$del = mysqli_query($con,"UPDATE `candidate` SET is_deleted='$deleted' WHERE id=".$_REQUEST["delete"]);
		echo "<script>window.location.href = 'http://localhost/interview_system/index.php';</script>";
	}
	if(isset($_REQUEST["submit"]))
	{
		$uid1= $uid;
		$fname = $_REQUEST["fname"];
		$mname = $_REQUEST["mname"];
		$lname = $_REQUEST["lname"];
		$education = $_REQUEST["education"];
		$apply = $_REQUEST["apply"];
		$experience =$_REQUEST["experience"];
		$current = $_REQUEST["current"];
		$expected = $_REQUEST["expected"];
		$notice = $_REQUEST["notice"];
		$interviewdate = date('Y-m-d H:i:s', strtotime($_REQUEST["interviewdate"]));
		$reason = $_REQUEST["reason"];
		$status = $_REQUEST["status"];
		$rejected = $_REQUEST["rejected"] ? $_REQUEST["rejected"]:"";
		if(isset($_GET["id"])){

			$update = "UPDATE `candidate` SET `firstname`='$fname',`middlename`='$mname',`lastname`='$lname',`education`='$education',`post`='$apply',`total_experience`='$experience',`current`='$current',`expected`='$expected',`notice`='$notice',`interviewdate`='$interviewdate',`reason`='$reason',`status`='$status',`rejected`='$rejected' WHERE id=".$_GET['id'];
			
			mysqli_query($con,$update);
			echo "<script>window.location.href = 'http://localhost/interview_system/index.php';</script>";

		}else{
			
			$str = "INSERT INTO `candidate`(`user_id`, `firstname`, `middlename`, `lastname`, `education`, `post`, `total_experience`, `current`, `expected`, `notice`, `interviewdate`, `reason`, `status`,`rejected`) VALUES ('$uid1','$fname', '$mname', '$lname','$education', '$apply', '$experience', '$current', '$expected', '$notice', '$interviewdate', '$reason', '$status','$rejected')";
			
			mysqli_query($con,$str);
			echo "<script>window.location.href = 'http://localhost/interview_system/index.php';</script>";
		}
		
	}

	if(isset($_GET["id"]))
	{
		
		$ar = mysqli_query($con,"SELECT * FROM `candidate` where id=".$_GET['id']);
		$row =mysqli_fetch_array($ar);
	}
	?>

	<h2>Registration Form</h2>
	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="container">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<form method="post" name="registration">
					<table border="0">
						
						<tr>
							<td>First Name</td>
							<td><input type="text" name="fname"  id="fname" value="<?php echo isset($row['firstname']) ? $row['firstname'] : "";?>"></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td><input type="text" name="mname" id="mname" value="<?php echo isset($row['middlename']) ? $row['middlename'] : "";?>"></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td><input type="text" name="lname" id="lname" value="<?php echo isset($row['lastname']) ? $row['lastname'] : "";?>"></td>
						</tr>
						<tr>
							<td>Education</td>
							<td>
								<select name="education" id="education">
									<option value="">--EDUCATION--</option>
						  			<option value="bca" <?php  if(isset($row["education"])) { echo $row["education"] == 'bca' ? 'selected':''; }?>>bca</option>
						  			<option value="mca" <?php if(isset($row['education'])) { echo $row['education'] == 'mca' ? 'selected':'';}?>>mca</option>
						  			<option value="b.e/b.tech" <?php if(isset($row['education'])) { echo $row['education'] == 'b.e/b.tech' ? 'selected':'';}?>>b.e/b.tech</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Apply For</td>
							<td name="posts" id="posts">
								<input type="radio" name="apply" value="php" <?php if(isset($row['post'])) { echo $row['post'] == 'php' ? 'checked':'';}?>> php
	  							<input type="radio" name="apply" value="java" <?php if(isset($row['post'])) { echo $row['post'] == 'java' ? 'checked':'';}?>> java
	  							<input type="radio" name="apply" value="android" <?php if(isset($row['post'])) { echo $row['post'] == 'android' ? 'checked':'';}?>> android  
							</td>
						</tr>
						
						<tr>
							<td>Total Experience</td>
							<td><input type="text" name="experience" id="experience" value="<?php echo isset($row['total_experience']) ? $row['total_experience'] : "";?>"></td>
						</tr>
						<tr>
							<td>Current CTC</td>
							<td><input type="text" name="current" id="current" value="<?php echo isset($row['current']) ? $row['current'] : '';?>"></td>
						</tr>
						<tr>
							<td>Expected CTC</td>
							<td><input type="text" name="expected" id="expected" value="<?php echo isset($row['expected']) ? $row['expected'] : '';?>"></td>
						</tr>
						<tr>
							<td>Notice Period</td>
							<td><input type="text" name="notice" id="notice" value="<?php echo isset($row['notice']) ? $row['notice'] : "";?>"></td>
						</tr>
						<tr>
							<td>Interview Date</td>
							<td><input type="text" name="interviewdate" id="datepicker" value="<?php echo isset($row['interviewdate']) ? $row['interviewdate'] : "";?>"></td>
						</tr>
						<tr>
							<td>Reason to leave job</td>
							<td><input type="text" name="reason" id="reason" value="<?php echo isset($row['reason']) ? $row['reason'] : "";?>"></td>
						</tr>

							<td><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></td>
						
						<tr>
							<td>Select Status</td>
							<td>
								<select name="status" id="status">
									<option id="" value="">--STATUS--</option>
									<option id ="rejected" value="Rejected" <?php  if(isset($row['status'])){ echo $row['status'] == 'Rejected' ? 'selected' : '';}?>>Rejected</option>
								  	<option id="reviewed" value="Reviewed" <?php  if(isset($row['status'])){ echo $row['status'] == 'Reviewed' ? 'selected' : '';}?>>Reviewed</option>
								  	<option id="hired" value="Hired" <?php  if(isset($row['status'])){ echo $row['status'] == 'Hired' ? 'selected' : '';}?>>Hired</option>
								</select>
							</td>
						</tr>
						<tr>
						<?php
						
							if(isset($row['status'])){
								
								$statusReject = $row['status'];
							} 
						?>
							<td colspan="2">
								<textarea id="show" name="rejected" rows="5"  cols="25" style="display:none;" ><?php echo isset($row['rejected']) ? $row['rejected']:""; ?></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info"></td>
							<td><a href="index.php" class="btn btn-primary">cancel</a></td>
						</tr>
					</table>		
				</form>
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
<script>
		  $(document).ready(function(){

		  	$("#status").change(function(){

		  		var value = $("#status").val();
		  		
		  		if(value == 'Reviewed'|| value == 'Hired' || value == '')
		  		{
		  			$("#show").hide();
		  		}else{
		  			$("#show").show();
		  		}
		  	});

		  	var reject = '<?php  echo isset($statusReject) ? $statusReject:'';?>';
		  		console.log(reject);
	  		if(reject == 'Rejected'){
	  			$("#show").show();
	  		}
		  });
	  </script>

</body>
</html>