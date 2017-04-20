<?php 
include('config.php');
session_start();
$username = $_SESSION['username'];
$id=$_GET['id_prod'];
$comment=$_POST['comment'];
 $q=mysql_query("SELECT * FROM mem_info WHERE username='$username'");
 $e=mysql_fetch_array($q);
 $r=mysql_query("SELECT * FROM members where mem_id='$e[info_id]'");
 $t=mysql_fetch_array($r);

$qry=mysql_query("INSERT into comments (com_id,content,user,pic,id_prod)VALUES('','$comment','$t[fname]','$t[profile_pic]','$id')");
header("location:welcome.php#popup2?id_prod=$id");




?>