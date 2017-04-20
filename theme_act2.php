<!DOCTYPE html>

		<link rel='stylesheet' type='text/css' href='css/login-activation.css'>
<?php
session_start();
include('config.php');
$theme=$_POST['theme'];

$query=mysql_query("UPDATE theme SET css='$theme' where id='1'");
header("location:product.php#popup1");	
?>

</html>