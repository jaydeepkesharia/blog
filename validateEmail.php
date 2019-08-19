<?php 

include"connect.php";


if(isset($_REQUEST["email"])){

	$ar = mysqli_query($con,"SELECT ID FROM `admin` where email='".$_REQUEST['email']."'LIMIT 1;");
	
	$row =mysqli_fetch_array($ar);
	
	if(mysqli_num_rows($ar) == 0){

		echo "true";  //good to register
	}
	else
	{
		echo "false"; //already registered
	}

	}
 ?>