<?php 
include('config.php');
$query=mysql_query("SELECT * FROM theme");
while ($query1=mysql_fetch_array($query)) {
$style=$query1['css'];
}
?><DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/<?php echo"$style";?>.css">
<link rel="stylesheet" type="text/css" href="css/popup.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<body>
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
                <li><a href="index.php" class="glyphicon glyphicon-home" >&nbsp;Home</a></li>
                <li><a href="product.php" class="glyphicon glyphicon-shopping-cart">&nbsp;Shop</a></li>
                <li class="active"><a href="about.php" class="	glyphicon glyphicon-info-sign">&nbsp;About</a></li>
               	<li><a href="#popup1">Theme</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li style="margin-right: 20px;"><a href="login.php" class="glyphicon glyphicon-log-in">&nbsp;Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid" style="height:100%;">
<div id="about">
<h1 align = "center"> Wear Kapampangan </h1> 
	<p align = "justify" style="font-size: 20px; padding:5px;"> 
		&nbsp &nbsp &nbsp &nbsp &nbsp Wear Kapampangan is an indie clothing line aimed to promote the beauty of the kapampangan language through graphic
		designed t-shirts an print media. The name of the shop Wear Kapampangan was originally came from the idea "We are Kapampangan". It was
		conceptualized way back in 2009 by lead creative and owne Mr. Allan Sampang and it was introduce in the market in February 2010.
	</p>
	<p align = "justify" style="font-size: 20px; padding:5px;"> 
		&nbsp &nbsp &nbsp &nbsp &nbsp The first four years of it was an online shop but it was only through facebook page but after a year they decided to open a shop and
		it was located at 2nd flr. Padiz Bldg. 516 Mac Arthur Highway, Sto. Domingo, Angeles City and has also established Robinsons Starmills CSF
		and Marquee Mall Angeles City.
	</p>

</div>
<div id="popup1" class="overlay">
	<div class="popup" style="width: 340px;height: 150px;">
		<h2>Select theme</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		<?php	
	
		echo "<form action='themeabout.php' method='post'> </p>
<div id='size'>
				select theme:
				<select name='theme'>
					<option>$style</option>
					<option>SolarizedLight</option>
					<option>Default</option>
					<option>SolarizedDark</option>
					
				</select>
		</div>
		<input style='margin-top: 20px;' id='atc' type = 'submit' name ='submit' value = 'select' />
		</form>";	
?>
			</div>
	</div>
	</div>
	</div>
	</body>




<footer class="mt-5" >
<div class="container-fluid bg-primary py-3">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-9">
          <p class="text-white">2nd floor, Padis Bldg. Sto. Domingo, Angeles city</p>
        </div>
        <div class="col-md-3">
          <div class="d-inline-block">
            <div class="bg-circle-outline d-inline-block">
              <a href="https://www.facebook.com/" class="text-white">
              <img src="image/fb.png"  style="width: 40px; height: 40px;" >
              </a>
            </div>

            <div class="bg-circle-outline d-inline-block">
              <a href="https://twitter.com/" class="text-white">
                <img src="image/twitter.png" style="width: 30px; height: 30px;"></i></a>
            </div>

            <div class="bg-circle-outline d-inline-block">
              <a href="https://www.linkedin.com/company/" class="text-white">
                <img src="image/ig.png" style="width: 30px; height: 30px;"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>		