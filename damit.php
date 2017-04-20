<body>
<link rel="stylesheet" type="text/css" href="css/login-activation.css">
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
include('config.php');

$username=$_SESSION['username'];

$query1=mysql_query("Select * from c2_quantity where c2_user='$username' order by c2q_id DESC");
$temp=0;
	$temp1=0;
while($query2=mysql_fetch_array($query1))
{
	$temp=$query2['c2q_quantity'];
	$temp1=$temp+$temp1;
}	

	
?>

	<img id="logoprod" src="logo.jpg" width="100%"/>

		<ul id="ulcart" style="top:187px;" >
		<div id="left">
			<!--li><a href="request1.php">Request(<?php echo "$ctr";?>)</a></li>
			<li><a href="landscapes.php">Landscaping design</a></li-->
			<li><a href="cart1.php">Cart(<?php echo "$temp1";?>)</a></li>
			<li id="active" ><a class="b" href="damit.php">Shirts</a></li>
		</div>
		<div class="slider-right">
	<div class="dropdown">
			<li><a  href="#.php" style='margin-top: 6px; height:20;'><?php echo"$username";?></a></li>
		<div id="account" class="dropdown-content">
			<button id="act" style="top: 45px; height: 44px;width: 93px;"><a href="logout.php" style="color: white; font-size: 15px;">logout</a></button>
		</div>
	</div>
</div>
	</ul>
		
	
<?php

include('config.php');

echo"<body >"; 

$query1=mysql_query("select products.name, p_image.image, products.price,products.id_prod, p_image.stock from p_image 
	inner join products 
	on products.id_prod=p_image.img_id
	order by products.id_prod DESC ");

while($query2=mysql_fetch_array($query1))

{
echo"
<div id='abs'>";
echo"<fieldset id='prod' style='height: 400px; font-family:Segoe Print;'>
	<legend id='productname'>". $query2['name']."</legend>";


echo "<img src=product/".$query2['image']. " width='100%' height='75%'>";

echo "<a id='presyo'>&#8369;&nbsp;".$query2['price']. ".00</a>";

?>

<div class="box">
<?php echo "<a href=#popup1?id_prod=".$query2['id_prod']." '><input id='atc' type = 'submit' name ='submit' value = 'View' /></a>";
	?>
</div>

<div id="popup1?id_prod=<?php echo "$query2[id_prod]";?>" class="overlay">


	<div class="popup">
		<a class="close" href="damit.php#popup1">&times;</a>
	<div class="content">
			<?php 
			$stck=0;
			$drg=mysql_query("SELECT * FROM p_image WHERE img_id='$query2[id_prod]'");
			while ($exp=mysql_fetch_array($drg)) {
				$stck=$exp['stock'];
			}
echo "<img id='view' src=product/".$query2['image']. ">
	<div id='option' style='margin-top: 30px; font-family:Segoe Print;'>
	<div id='name'>
				<p>$query2[name]</p>
		</div>
		<img src='image/line.png' style='width: 330px; height: 10px;'>
		<p align='justify'>Enjoy shopping. :) </p>
			<p style='font-size:20px; margin:0px;'>&#8369;$query2[price].00 || $stck&nbsp;stocks left
<form action='addcart1.php?id_prod=$query2[id_prod]' method='post'> </p>
<div id='size'>
				Size:
				<select name='size'>
					<option>Small</option>
					<option>Medium</option>
					<option>Large</option>
					<option>X-large</option>
				</select>
		</div>
		<img src='image/line.png' style='width: 330px; height: 10px; margin-top:30px;'>
		<input style='margin-top: 20px;' id='atc' type = 'submit' name ='submit' value = 'add to cart' />
		</form>
		"
		;?>
		</div>
	</div>
</div>
<?php 
echo"</fieldset>
<div>";
}
?>
</body>