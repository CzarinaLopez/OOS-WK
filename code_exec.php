<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/messages.css">
</head>
<body>

</body>
</html>
<?php
session_start();
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
	echo "<script>window.location.assign('register.php')</script>";
	
}
	else 
		{	
$query1 = mysql_query("INSERT INTO members(mem_id,fname,lname,gender,status,profile_pic) VALUES('','$fname','$lname','$gender','1',
	'$image')");
$query1 = mysql_query("INSERT INTO mem_info(info_id,address,contactnum,month,day,year,username,password) VALUES('','$address','$contact','$month','$day','$year','$username','$password')");
	if($query1){
	$message = "Succesfully registered";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('login.php')</script>";
	}
	}
	}else{
		echo "<div class='container'>
    <div class='row'>
        <div class='col-sm-6 col-md-6'>
            <div class='alert alert-success'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>
               <span class='glyphicon glyphicon-ok'></span> <strong>Success Message</strong>
                <hr class='message-inner-separator'>
                <p>
                    You successfully read this important alert message.</p>
            </div>
        </div>
        </div>";
	}
}
}else{
	$message = "Password must contain 4-15 characters!";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('register.php')</script>";
}
?>
<br />
