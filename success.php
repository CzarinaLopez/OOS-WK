<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['username']))
{
if(!$_SESSION['username']=='admin')
{
header("Location:login.php?id=You are not authorized to access this page unless you are administrator of this website");
}
}
else
{
header("Location:login.php?id=You are not authorized to access this page unless you are administrator of this website");
}


?>

<?php 
include("config.php");
$username=$_SESSION['username'];
$total=0;
$gtotal=0;
if(isset($_GET['mem_id']))
{
$id=$_GET['mem_id'];


$address=$_POST['address'];
$contact=$_POST['contact'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];


$query3=mysql_query("UPDATE members SET fname='$fname', lname='$lname' WHERE mem_id='$id'");
$query4=mysql_query("UPDATE mem_info SET address='$address', contactnum='$contact' WHERE info_id='$id'");


}

$j=mysql_query("SELECT * FROM mem_info WHERE username='$username'");
$c=mysql_fetch_array($j);
$g=mysql_query("SELECT * FROM members WHERE mem_id='$c[info_id]'");
$s=mysql_fetch_array($g);
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
                <li><a href="" >&nbsp;CONFIRM YOUR PERSONAL AND CONTACT INFORMATION</a></li>
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
	<?PHP 
$query1=mysql_query("SELECT * FROM cart WHERE user='$username'");

echo"<div id='receipt'>

	<div class='receipt'>
		<div id='headerreceipt'>
			<p>Wear Kapampangan<p>
			<p>2nd floor, Padis Bldg. Sto. Domingo, Angeles city</p>
				<img src='image/line.png' style='width: 500px; height: 10px; padding-top:8px;'>
		</div>
		<table>
			<tr>
				<td>
					<p>date:"; date_default_timezone_set("Asia/Manila") ; echo "".date('Y-m-d')."</p>
				
				<td>
					<p>time:".date('H:i')."</p>
				</td>
				
			</tr>
			<tr>
				<td>
					<p>Product</p>
				</td>
					</td>
				<td>
					<p>Total</p>
				</td>
				
			<tr>
					<td colspan='2'>
					<img src='image/line.png' style='width: 480px; height: 10px;'>";
			while($query2=mysql_fetch_array($query1))
			{
				
echo"

		
			<tr>
				<td>
					$query2[name]"; echo "(".$query2['quantity']."x)
				</td>
				<td>
				$query2[price]
				</td>
			</tr>";
		
			$total1=$total;
$total2=($query2['quantity']*$query2['price']);
$total=($query2['quantity']*$query2['price'])+$total1;
$gtotal=$total;
}
			echo" 
				<tr >
				<td colspan='2'>
					<img src='image/line.png' style='width: 480px; height: 10px;'>
				</td>
			</tr>
			<tr>
				<td>
					<p>order total</p>
				</td><td>$gtotal</td>
			</tr>
			</table>

	</div>
			<div>
				<a href='javascript:window.print()'' class='register-but' style='margin: 8px 50px 0 55px; '><img src='image/prit.png' width='18px' height='13px' >Print Copy of Receipt</a>
			
				<a href='done.php' class='register-but'  style='margin: 8px 30px 20px 20px; ' >Done</a>
			</div>
</div>
</form>

</div>";

?>
