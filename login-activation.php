<!DOCTYPE html>
<?php
session_start();
include('config.php');


	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM mem_info WHERE username = '$username' and password = '$password'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
if (isset($_POST['username']) and isset($_POST['password']))
	{
		
		
			$username = $_POST['username'];
			$password = $_POST['password'];
			
		if ($count == 1)
			{
				$cj=mysql_query("SELECT * FROM mem_info where username='$username'");
				$dp=mysql_fetch_array($cj);
				$id=$dp['info_id'];
				$w=mysql_query("SELECT * FROM members WHERE mem_id='$id'");
				$k=mysql_fetch_array($w);

				if($k['status']=='1'){

				$_SESSION['username'] = $username;
				$username = $_SESSION['username'];
				header("location:welcome.php");
				}else{
					$message = "This account is Deactivated by the admin. Please contact the admin for concerns";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('login.php')</script>";
	
				}
}
			
			
		else if(isset($_POST['username']) and isset($_POST['password']))
			{
				
		$message = "Username or Passwords is incorrect";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('login.php')</script>";
			
	}
	

	
else
{
header("index.php");
}
	}
?>
