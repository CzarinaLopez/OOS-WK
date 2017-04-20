<?php
include("config.php");
session_start();
if(isset($_SESSION['username']))
{
if(!$_SESSION['username'])
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
?><DOCTYPE html>
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
            <li><a><img src='image/check.png' style='width:20px; height:20px;'>1. Login</a></li>
            <li><a>2. Payment</a></li>
                 
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

            </div>
        </div>
    </div>
    </div>
    <?php 

    $gtotal=$_GET['gtotal'];
    echo "


    <form action='checkprocess.php?gtotal=$gtotal' method='post'>
    
<div class='payment'>
    <div>
        <h3>Please choose the type of Payment!$gtotal</h3>
        <img src='image/line.png' style='width: 700px; height: 10px;'>
    </div>

    <table id='COD'>
        <tr>
            <td >
                
                <img src='image/cod1.png' style='width: 200px; height: 200px; margin: 0 auto 0 auto; display: block; '>
                <h4><input type='radio' name='opsyon' value='cod' required/>Cash on Delivery</h4>
            </td>
        
            <td>
            
                    <img src='image/pp.png' style='width: 200px; height: 200px; margin: 0 auto 0 auto; display: block;'>
                <h4><input type='radio' name='opsyon' value='paypal' required/>Paypal</h4>
                </td>
            </tr>
            <tr style='margin:0px; height:20px;'>
                <td colspan='2' style='margin:0px; height:20px; padding: 0;'>
                    <img src='image/line.png' style='width: 700px; height: 10px;'>
            </td>
        </tr>

    <table>
    <div >
        <input class='register-but' type='submit' name='submit' value='Submit' style='
    margin-left: 31%;'>
        <a class='register-but' href='cart1.php' style=' margin-left: 70px;'>Cancel</a>
    </div>
    
</div>
    </form>
 ";
 ?>
<script type="text/javascript">
    $('#zxc').on('show.bs.modal', function(e) {
    var userid = $(e.relatedTarget).data('userid');
   window.location = "#inside?id=" + userid;
});
</script>
   

</div>

<div id="popup1" class="overlay">
    <div class="popup" style="width: 340px;height: 150px;">
        <h2>Select theme</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <?php   
        
            echo "<form action='theme_act.php' method='post'> </p>
            <div id='size'>
                    select theme:
                    <select name='theme'>
                        <option>$style</option>
                        <option>SolarizedLight</option>
                        <option>Default</option>
                        <option>SolarizedDark</option>
                        
                    </select>
            </div>
                <a href='index.php'><input style='margin-top: 20px;' id='atc' type = 'submit' name ='submit' value = 'select' /></a>
                </form>";   
              ?>
        </div>
    </div>
</div>

    </body>