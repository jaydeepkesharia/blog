<?php 
session_start();
	if(isset($_REQUEST["remember"])) {
		$pass = base64_encode($_REQUEST["password"]);
		setcookie ("email",$_REQUEST["email"],time()+ 3600);
		setcookie ("password",$pass,time()+ 3600);
		echo "Cookies Set Successfully";
						
	} else {
		setcookie("email","");
		setcookie("password","");
		echo "Cookies Not Set";
	}
include"header2.php"; 
include"connect.php";

	if(isset($_REQUEST["submit"])){
		
		$email = $_REQUEST["email"]; 
		$pwd = $_REQUEST["password"];

		
		$ar = mysqli_query($con,"SELECT * FROM `admin` where email='".$email."'");
		$row =mysqli_fetch_array($ar);
		$password = password_verify($pwd, $row['password']);


		$uid = $row["id"];

		if($email == $row["email"]){
			if($password){
					
				$_SESSION["uid"] = $uid;
				echo "<script>window.location.href = 'http://localhost/interview_system/index.php';</script>";
			}else{
				echo "<script>alert('Your password is wrong');</script>";	
				echo "<script>window.location.href = 'http://localhost/interview_system/signin.php';</script>";
			}
		}else{
			echo "<script>alert('Your email id is wrong');</script>";
			echo "<script>window.location.href = 'http://localhost/interview_system/signin.php';</script>";
		}

	}

?>

<h2>Sign-in Form</h2>	

<div class="col-md-12 col-xs-12 col-sm-12">
	<div class="container">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<form action="" method="post" name='registration1'>
				<table border="0">
					
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" id="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];}?>"></td>
					</tr>

					<tr>
						<td>Password</td>
						<td><input type="Password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])){ echo base64_decode($_COOKIE['password']);}?>"></td>
					</tr>

					<tr>
						<td><input type="checkbox" name="remember">Remember me</td>
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

