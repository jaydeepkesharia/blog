<?php 
include"connect.php";
session_start();
$uid =$_SESSION["uid"];

						if($post = $_REQUEST['post']){
							if($status = $_REQUEST['status']){
								$ar = mysqli_query($con,"SELECT * FROM `candidate` where post='".$post."'AND status='".$status."'AND user_id=".$_SESSION["uid"]);
							}else{
								$ar = mysqli_query($con,"SELECT * FROM `candidate` where post='".$post."'AND user_id=".$_SESSION["uid"]);
							}
						}elseif($status = $_REQUEST['status']){	
							
								if($post = $_REQUEST['post']){
									$ar = mysqli_query($con,"SELECT * FROM `candidate` where post='".$post."'AND status='".$status."'AND user_id=".$_SESSION["uid"]);
								}else{
									$ar = mysqli_query($con,"SELECT * FROM `candidate` where  status='".$status."'AND user_id=".$_SESSION["uid"]);
								}
						}else{
							$ar = mysqli_query($con,"SELECT * FROM `candidate` where user_id=".$_SESSION["uid"]);
						}
			if(isset($uid)){
				?>
			
					<table border="1" width="100%" >
					<tr>
						<th>Full Name</th>
						<th>Post</th>
						<th>Total Experience</th>
						<th>Current CTC</th>
						<th>Expected CTC</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php while($row =mysqli_fetch_array($ar)){ 
							if($row["is_deleted"] == NULL){
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
								<a href="add.php?delete=<?php echo $row['id']; ?>" class="glyphicon glyphicon-trash"></a>
							</td>
						</tr>
					<?php
						}
					}
			}else{
					?>
					<script type="text/javascript">
						alert('you have to login first');
						location = 'http://localhost/interview_system/signin.php';
					</script>
					<?php
				}
					?>
				
