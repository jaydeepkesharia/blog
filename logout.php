<?php 
	session_start();
	$uid =$_SESSION["id"];
	$email = $_SESSION["email"];
	session_destroy();
	header('Location: signin.php');
	exit;
 ?>