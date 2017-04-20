<?php
include('config.php');

session_start();
$username=$_SESSION['username'];



$gtotal=$_GET['gtotal'];

if(isset($_POST['submit'])){
if(isset( $_POST['opsyon'])){  
        if($_POST['opsyon']=='cod'){
               echo "<script>window.location.assign('confirm.php')</script>";
        }else{
}
}
 }
?>