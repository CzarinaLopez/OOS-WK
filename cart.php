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
$g=mysql_query("SELECT * FROM cart WHERE user='$username'");
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

button {
    margin-bottom: 3px;
}
table, td, th
{
    border: 1px solid black;
}
table 
{
    border-collapse: collapse;
    width: 80%;
    margin: auto;
    margin-top: 40px;
}
th, th, td
{
    text-align: left;
}
th, td
{
    padding: 8px;
}
th
{
    background-color: #232323;
    color: white;
}
#cart
{   
    height:40px; 
    margin:auto;
    padding:10px;
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
                <li><a href="welcome.php" >&nbsp;Shirt</a></li>
                <li class="active"><a href="cart.php" >&nbsp;My Cart<?php echo"($ctr)";?></a></li>            </ul>
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

<?php
include('config.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$cj=mysql_query("SELECT * FROM cart where id='$id'");
 $dp=mysql_fetch_array($cj);
 echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <button type='button' class='close'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
        <img src='image/success.png' style='height:15px; width:15px;'>$dp[name] is Removed to your cart
    </div>
    </div>";
$query1=mysql_query("delete from cart where id='$id'");


}
if(isset($_GET['total'])){

    $ctr=0;

    $gtotal=$_GET['total'];
$query1=mysql_query("SELECT * FROM cart where user='$username'");
while($query2=mysql_fetch_array($query1)){
$ctr++;
}
if ($ctr==0) {
    echo " 
  <div class='page-alerts'>
 <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'>YOUR CART IS EMPTY
    </div>
    </div>";
}else{
    $cnf=0;
    $qty=0;
    $qry=mysql_query("SELECT * FROM cart WHERE user='$username'");
    while($qry1=mysql_fetch_array($qry)){
$qty=$qry1['quantity'];
      $drg=mysql_query("SELECT * FROM products WHERE name='$qry1[name]' ");
      while ($cj=mysql_fetch_array($drg)) {
         $dp=mysql_query("SELECT * FROM p_image WHERE img_id='$cj[id_prod]'");
         while($exp=mysql_fetch_array($dp)){
            $cnf=$exp['stock'];
         }
      }

    }
     
    if($qty>$cnf){
 echo " 
  <div class='page-alerts'>
 <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> OUT OF STOCK
    </div>
    </div>";
    }else{
        header("location:checkout.php?gtotal=$gtotal");
}
 }
}
?>
<body style="margin-top: 15%; ">
<div class="container-fluid" >

 
<?php
include('config.php');

echo"<div id='cart'>";
$total=0;
$ctr=0;
$gtotal=0;


$query1=mysql_query("SELECT * FROM cart WHERE user='$username'");


echo"
<div>
    <table text-align='center'>
    <tr>
        <th>Product</th>
        <th>Quantity(maximum of 99)</th>
        <th>Size</th>
        <th>Price</th>
        <th>Totalprice</th>
        <th style='width: 80px;'>
            <a href='emptycart.php?user=$username'>
                <input id='atc' type = 'submit' name ='submit' value = 'Empty cart' style='margin: 0;'/>
            </a>
        </th>";
while($query2=mysql_fetch_array($query1))
{
echo "<form action='updatecart1.php' method='post'>";
$id=$query2['id'];

echo "<tr>
        <td>".$query2['name']."</td>
        <td>
            <input type=text name='quantity[$id]' value=".$query2['quantity']." maxlength='2'>
        </td>
        <td>$query2[size]</td>
        <td>"."$".$query2['price']."</td>";
$total1=$total;
$total2=($query2['quantity']*$query2['price']);
$total=($query2['quantity']*$query2['price'])+$total1;
$gtotal=$total;

echo "<td>$total2</td>";
echo "<td>
        <a href='cart.php?id=".$query2['id']."'>Remove</a>
    </td>";
}
echo"
    </tr>
        <td>
            <a href='cart.php?total=$gtotal'>
                <input id='atc' type = 'button' name ='submit' value = 'Checkout' style='margin-top:0;'/>
            </a>
        </td>
        <td colspan='2'>
            <input id='atc' type = 'submit' name ='submit' value = 'Update' style='margin-top:0;'/>
        </td>
        <td colspan='3'> total = P&nbsp; $gtotal</td>
    </tr>
</form>
</div>
</table>
</div>";?>

    <div id="popup2?id_prod=<?php echo "$query2[id_prod]";?>" class="overlay">


        <div class="popup">
            
            <a class="close" href="#popup2">&times;</a>
            <div class="content">
  <?php 
                $stck=0;
                $drg=mysql_query("SELECT * FROM p_image WHERE img_id='$query2[id_prod]'");
                while ($exp=mysql_fetch_array($drg)) {
                    $stck=$exp['stock'];
                }
    echo "  
    <table>
<tr><td>
<img id='view' src=product/".$query2['fimage']. ">
     </td>
        <td><div id='name'>$query2[name]</div></td>
        </tr></table>

         
   

       ";?>
            </div>
        </div>
    </div>
    </div>
 
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