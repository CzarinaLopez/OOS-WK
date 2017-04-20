<!DOCTYPE html>
<style type="text/css">
td
{
padding: 5px;
border: 1px solid #ccc;
}
</style>
</head>
<body>

<?php
include('config.php');
if(isset($_GET['mem_id']))
{
$id=$_GET['mem_id'];
$query=mysql_query("SELECT status FROM members where mem_id='$id'");
$query1=mysql_fetch_array($query);
$stat=$query1['status'];
if($stat=='1')	{
	 $query=mysql_query("UPDATE members SET status='0' where mem_id='$id'");

	 $message = "Deactivated";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('member.php')</script>";
}
	else{
 $query=mysql_query("UPDATE members SET status='1' where mem_id='$id'");


$message = "Activated";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('member.php')</script>";
}

}



?>
</body>
</html>