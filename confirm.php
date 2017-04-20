<?php
include("config.php");
session_start();
if(isset($_SESSION['username']))
{
if(!$_SESSION['username']=='admin')
{
header("Location:login.php?id=Please Log in first!");
}
}
else
{
header("Location:login.php?id=Please Log in first!");
}

?>
<?php 
include('config.php');
$ctr=0;
  $username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM theme");
while ($query1=mysql_fetch_array($query)) {
$style=$query1['css'];
}
$g=mysql_query("SELECT * FROM cart");
while ($s=mysql_fetch_array($g)) {
    $ctr++;
}


$j=mysql_query("SELECT * FROM mem_info WHERE username='$username'");
$c=mysql_fetch_array($j);
$g=mysql_query("SELECT * FROM members WHERE mem_id='$c[info_id]'");
$s=mysql_fetch_array($g);
?>
<?php
include('config.php');

$username=$_SESSION['username'];
if(isset($_GET['id_prod']))
{
    $size=$_POST['size'];
$id_prod=$_GET['id_prod'];
$query1=mysql_query("select * from  p_image where img_id='$id_prod'");
while($query2=mysql_fetch_array($query1)){
    if($query2['stock']==0){
    $message = "OUT OF STOCK";
  echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>window.location.assign('damit.php#popup1')</script>";
    }else{
        $query3=mysql_query("select * from  products where id_prod='$id_prod'");

while($query4=mysql_fetch_array($query3))
{

$query5=mysql_query("INSERT into cart (id,name,quantity,price,size,user)VALUES('','$query4[name]','1','$query4[price]','$size','$username') ");

if ($query5) {
    
  echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <button type='button' class='close'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
        <img src='image/success.png' style='height:15px; width:15px;'>$query4[name] is Added to your cart
    </div>
    </div>";
}
}
    }   
}



}
?>
<DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/<?php echo"$style";?>.css">
<link rel="stylesheet" type="text/css" href="css/popup.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
  </script>

  <style>
@import url('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
.receipt, #receipt
{ 
    border: solid;
    width: 500px;
    display: solid;
    margin:  30px  auto  0px auto;
}
.receipt table,.receipt tr,.receipt td
{
    width: 250px;
    text-transform: uppercase;
    margin-top: 0px;
}
#abcd{
    margin: 20px 0 0 20px;
}
#receipt, .receipt table,.receipt tr,.receipt td
{
    border: hidden;
}
#headerreceipt
{
    background-color: rgba(13, 13, 13, 0.62);
    height: 55px;
    color: white;
}
#headerreceipt p
{
    text-align: center;
    height:8px;
    margin: 0px 6px 7px 6px;
}

#shipping, #shipping .payment
{
    height: 250px;
    width: 700px;
    margin:  20px  auto  auto auto;
    position: reltive;
}
#CAD input[type="text"]
{
    width: 240px;
    height: 30px;
}
.payment
{
    border: solid;
    width: 710px;
    height: 400px;
    margin: 220px auto 0 auto;
}
.payment h3
{
    margin:0;
    padding:7px;
    background-color: rgba(13, 13, 13, 0.62);
    color: white;
}
#COD, #CAD
{
    width:700px;
    border: hidden;
    margin: 0 auto 15px auto;
    background-color: white;
    
}
#CAD td, #CAD tr, #CAD span
{
    margin: 0;
    border: hidden;
    width: 320px;
    height: 40px;

}
#COD td, #COD tr
{
    height: 200px;
    padding: 20px 40px 0 40px ;
    border: hidden;
}
#COD h4
{
    margin-top: 2px;
    text-align: center;
}

button {
    margin-bottom: 3px;
}


/* REQUIRED */
.page-alerts {
    margin-bottom: 20px;
        position: relative;top: 20px;
}

.page-alerts .page-alert {
    border-radius: 0;
    margin-bottom: 0;
}
button {
    margin-bottom: 3px;
}

#tryagain input[type="submit"], .login input[type="submit"], .register-but  input[type="submit"] , #closebutton a, .register-but
{
    background:black;
    text-transform: uppercase;
    border:none;
    outline:none;
}
#tryagain input[type="submit"], .login input[type="submit"], .register-but  input[type="submit"] , #closebutton a, .register-but
{
    color: #FFF;
    font-size: 0.8em;
    padding: 0.7em 1.2em;
    transition: 0.5s all;
    display: inline-block;
    text-decoration: none;
}
.register-but  input[type="submit"] , #closebutton a, .register-but
{
    padding: 0.8em 2em;
    -webkit-transition: 0.5s all;
    margin-left: 40%;

}
.regButton
{
    -webkit-transition: 0.5s all;
    text-transform: uppercase;
    margin-left: 30%;
}
.login input[type="submit"], .regButton
{
    background:#397d02;
}

/* REQUIRED */
.page-alerts {
    margin-bottom: 20px;
        position: relative;top: 20px;
}

.page-alerts .page-alert {
    border-radius: 0;
    margin-bottom: 0;
}
</style>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div >
 <img id=logo src="image/logo.png">
        <div class="navbar-header">
       
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" ></span>
                <span class="icon-bar" ></span>
                <span class="icon-bar" ></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a>1. Login</a></li>
            <li><a><img src='image/check.png' style='width:20px; height:20px;'>2. Payment</a></li>
            <li><a><img src='image/check.png' style='width:20px; height:20px;'>3. Shipping</a></li>
                        </ul>
            <ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">
                 <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" glyphicon glyphicon-menu-hamburger"></i>&nbsp;<?php echo "$s[fname]";?> <b class="fa fa-angle-down" ></b></a>
            <ul class="dropdown-menu">
                    <!--li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li-->
                    <li><a href="#popup1">Theme</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php"></i> Logout</a></li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>

<body style="margin-top: 15%; ">
<div class="container-fluid" >
<?php 
        $query=mysql_query("SELECT * FROM  mem_info where username='$username'");
        while($query1=mysql_fetch_array($query)){
                $query2=mysql_query("SELECT * FROM members where mem_id='$query1[info_id]'");
                while($query3=mysql_fetch_array($query2)){
echo "
  
<form action = 'success.php?mem_id=$query3[mem_id]' method = 'POST' >
<div class='payment' style='height: 270px; margin-top:70px; background-color: white;'>
    <div>
        <h3>Please confirm your details for delivery purpose!</h3>
        <img src='image/line.png' style='width: 700px; height: 10px;'>
    </div>

    <table id='Cad' class='PersonalInfo' style='margin-top:20px;'>
        <tr>
            <td >
                <span>First Name:&nbsp</labe>
                <input type='text' name='fname' value='$query3[fname]' required/></span>
            </td>
                <td >
                <span>Last name:&nbsp</labe>
                <input type='text' name='lname' value='$query3[lname]' required/></span>
            </td>
        </tr>
        <tr>        
            <td>
            
                    <span>Address:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type='text' name='address' value='$query1[address]' required/></span>
            </td>
            <td>
            
                    <span>Contact#:</label><img src='image/flag.png' style='width: 25px;'>
                <input type='text' name='contact' value='$query1[contactnum]' maxlenght='10' maxlenght='10' required style='
    width: 222px;' /></span>
                </td>
        </tr>
    <table>
    <div >
    <img src='image/line.png' style='width: 700px; height: 10px;'>
        <input class='register-but' type='submit' name='submit' value='ok' style='
    margin-left: 31%; margin-top:9px;'>
        <a class='register-but' href='checkout.php' style=' margin-left: 70px; margin-top:9px;'>Back</a>
    </div>
    
</div>
</form>";
        }

}
     ?>


    </body>