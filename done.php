<?php
include("config.php");
session_start();
$username=$_SESSION['username'];
$odate= date('Y-m-d');
$nstock=0;

$query1=mysql_query("SELECT * FROM cart WHERE user='$username'");
while($query2=mysql_fetch_array($query1)){
	$ty=mysql_query("SELECT * FROM mem_info WHERE username='$username'");
	while($shit=mysql_fetch_array($ty)){

		$query5=mysql_query("INSERT into orders (order_id,o_name,o_price,o_size,mem_id)VALUES('','$query2[name]','$query2[price]','$query2[size]','$shit[info_id]') ");
	}
$query6=mysql_query("INSERT into i_order (oi_id,quantity,dateorder) VALUES('','$query2[quantity]','$odate')");
	
	$xx=mysql_query("SELECT * FROM products WHERE name='$query2[name]'");
      	while($yy=mysql_fetch_array($xx)){
      				$jake=mysql_query("SELECT * FROM p_image WHERE img_id='$yy[id_prod]'");
      				while ($pacia=mysql_fetch_array($jake)) {
      					$nstock=($pacia['stock']-$query2['quantity']);
      					$pls=mysql_query("UPDATE  p_image SET stock='$nstock' WHERE img_id='$yy[id_prod]'");
      				
      				}
			}
		}


$query7=mysql_query("delete from cart where user='$username'");


	$message = "Thank you for shopping!";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('welcome.php')</script>";
 ?>