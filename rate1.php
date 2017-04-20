<?php 
include('config.php');

$id=$_GET['id'];
$rate=0;
$qry=mysql_query("SELECT * FROM products WHERE id_prod='$id'");
$qry1=mysql_fetch_array($qry);
$count=$qry1['love'];
$rate=$count+1;
$qry2=mysql_query("UPDATE products SET love='$rate' where id_prod='$id'");
header("location:product.php#");




?>