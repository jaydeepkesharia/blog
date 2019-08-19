<?php 
error_reporting(E_ALL);
include"header.php"; 
include"connect.php";
session_start();
$email = $_REQUEST["email"];
$_SESSION["email"]  =  $email;
 //var_dump($email = $_REQUEST["email"]);exit;
//var_dump($email = $_SESSION["email"]);exit;
?>
<?php 
$ar = mysqli_query($con,"SELECT * FROM `admin` where email='".$email."'");
$row =mysqli_fetch_array($ar);
//var_dump($row["id"]);

 ?>
 <!--<form method="post" >
 	<input type="hidden" name="uid" value="<?php //echo $row["id"]; ?>">
 </form>-->
<p>Congrates you successfully signed up for login <a href="signin.php?uid=<?php echo $row['id']; ?>">click here</a>.</p>
