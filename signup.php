<?php
 include"header2.php"; 
 include"connect.php";

	
	if(isset($_REQUEST["submit"])){
		$fname = $_REQUEST["fname"];
		$lname = $_REQUEST["lname"];
		$email = $_REQUEST["email"]; //var_dump($email);
		$password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);
		//$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		
		
		$ar = mysqli_query($con,"SELECT * FROM `admin` where email='".$email."'");
		$row =mysqli_fetch_array($ar);
		
		if($email == $row["email"]){

			echo "<script>location= 'http://localhost/interview_system/signup.php';</script>";

		}else{
				
			$str = "INSERT INTO `admin`(`fname`, `lname`, `email`, `password`) VALUES ('$fname','$lname','$email','$password')";
			mysqli_query($con,$str);
			echo "<script>alert('you are successfully signed up');</script>";
			echo "<script>location = 'http://localhost/interview_system/signin.php';</script>";
		}	
	}
?>
<h2>Sign-Up Form</h2>

<div class="col-md-12 col-xs-12 col-sm-12">
	<div class="container">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<div id="messageSent"></div>
			<form action="" method="post" name='registration' id="register-form">
				<table border="0">
					<tr style="padding: 10px">
						<td>First Name</td>
						<td><input type="text" name="fname" id="fname"></td>
					</tr>
					
					<tr>
						<td>Last Name</td>
						<td><input type="text" name="lname" id="lname"></td>
					</tr>

					<tr>
						<td>Email</td>
						<td><input type="email" name="email" id="email"></td>
					</tr>

					<tr>
						<td>Password</td>
						<td><input type="Password" name="password" id="password"></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info"></td>
					</tr>
				</table>		
			</form>
		</div>
	</div>
</div>

