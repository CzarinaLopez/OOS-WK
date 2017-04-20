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
session_start();
foreach ( $_POST['quantity'] as $key => $val ) {


	if(ctype_digit($val)){
		
  $query5=mysql_query("select * from  cart where id='$key'");

  while($query6=mysql_fetch_array($query5))
{
$quer6=mysql_query("update cart set quantity='$val' where id='$key'");


header("location:cart.php");

}
}else{

$message = "Invalid quantity!";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign(' cart.php')</script>";

}
	}



?>
</body>
</html>


