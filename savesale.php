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
if(isset($_GET['id']))
{
$id=$_GET['id'];	
$per=$_POST['sale'];
$percent=".$per";

$query=mysql_query("SELECT * FROM products where id_prod='$id'");
$query2=mysql_fetch_array($query);
$saleprice=$query2['price']-($percent*$query2['price']);

$query3=mysql_query("UPDATE products SET saleprice='$saleprice',sale='1' WHERE id_prod='$id'");
$message = "Edit Done";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminprod.php#popup1?id_=$id')</script>";
}
?>
</body>
</html>