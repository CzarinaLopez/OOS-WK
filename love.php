<?php 
include('config.php');
session_start();	
$username=$_SESSION['username'];
$id=$_GET['id'];
$rate=0;

  $query = "SELECT * FROM reactions WHERE name = '$username' and prod='$id'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
if($count==1){
	header("location:welcome.php#popup2?id_prod=$id");
}else{
$qry=mysql_query("SELECT * FROM products WHERE id_prod='$id'");
$qry1=mysql_fetch_array($qry);
$count=$qry1['love'];
$rate=$count+1;
$qw=mysql_query("INSERT into reactions (id,name,prod)VALUES('','$username','$id')");
$qry2=mysql_query("UPDATE products SET love='$rate' where id_prod='$id'");
header("location:welcome.php#popup2?id_prod=$id");

}



?>