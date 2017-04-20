<!DOCTYPE html>

		<link rel='stylesheet' type='text/css' href='css/login-activation.css'>
<?php
session_start();
include('config.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
		$query = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
if (isset($_POST['username']) and isset($_POST['password']))
	{
		
		
			$username = $_POST['username'];
			$password = $_POST['password'];
			
		if ($count == 1)
			{
				$_SESSION['username'] = $username;
				$username = $_SESSION['username'];
				header("location: member.php");
}
			
			
		else if(isset($_POST['username']) and isset($_POST['password']))
			{
				
	$message = "This account is not registered in ADMIN. You are not admin!";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminlogin.php')</script>";
	
			
	}
	

	
else
{
header("index.php");
}
	}
?>

</html>