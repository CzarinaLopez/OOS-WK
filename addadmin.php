<?php
session_start();
include('config.php');

$username = $_POST['username'];
$password = $_POST['password'];

			$query = "SELECT * FROM admin WHERE username = '$username'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	
if($count==1){
	$message = "Username is already taken";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('register.php')</script>";
	
}
	else 
		{	
$query1 = mysql_query("INSERT INTO admin (id,username,password) VALUES('','$username','$password')");
	}
	if($query1){
	$message = "Succesfully registered";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminaccount.php')</script>";
	}
?>
<br />
