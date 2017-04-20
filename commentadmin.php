<?php 
include('config.php');
session_start();
$username = $_SESSION['username'];
$id=$_GET['id_prod'];
$comment=$_POST['comment'];
 $q=mysql_query("SELECT * FROM admin WHERE username='$username'");
 $e=mysql_fetch_array($q);

$qry=mysql_query("INSERT into comments (com_id,content,user,pic,id_prod)VALUES('','$comment','$t[fname]','$e[image]','$id')");
header("location:adminprod.php#review?id_prod=$id");




?>