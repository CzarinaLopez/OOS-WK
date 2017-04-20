<?php

include('config.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];
$image = $_POST['image'];
$month= $_POST['month'];
$day=$_POST['day'];
$year= $_POST['year'];
$strings= array($contact);
$num_length = strlen((string)$contact);
$num_length1 = strlen((string)$password);
if($num_length1 >=4 && $num_length1 <=15 ){


foreach($strings as $testcase){
	if(ctype_digit($testcase) && $num_length == 10){
			$query = "SELECT * FROM mem_info WHERE username = '$username'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	
if($count==1){
	$message = "Username is already taken";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminform.php')</script>";
	
}
	else 
		{	
$query1 = mysql_query("INSERT INTO admin (id,username,password,image,fname,lname,month,day,year,address,contact,gender) 
	VALUES('','$username','$password','$image','$fname','$lname','$month','$day','$year','$address','$contact','$gender')");

	if($query1){
	$message = "Succesfully registered";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminform.php')</script>";
	}
	}
	}else{
		$message = "contact is incorrect";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminform.php')</script>";
	}
}
}else{
	$message = "Password must contain 4-15 characters!";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminform.php')</script>";
}
?>
<br />
