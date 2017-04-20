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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
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
                <li class="active"><a href="index.php" class="glyphicon glyphicon-home" >&nbsp;Home</a></li>
                <li><a href="product.php" class="glyphicon glyphicon-shopping-cart">&nbsp;Shop</a></li>
                <li><a href="about.php" class="	glyphicon glyphicon-info-sign">&nbsp;About</a></li>
               	<li><a href="#popup1">Theme</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li style="margin-right: 20px;"><a href="login.php" class="glyphicon glyphicon-log-in">&nbsp;Login</a></li>
            </ul>
        </div>
    </div>
</nav>
   <header id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill">
                	<img src="image/2.jpg" alt="">
                </div>
              
            </div>
            <div class="item">
                <div class="fill">
                	<img src="image/1.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div class="fill">
                	<img src="image/3.jpg" alt="">
                </div>
             </div>
            <div class="item">
                <div class="fill">
                	<img src="image/4.jpg" alt="">
                </div>
            </div>
             <div class="item">
                <div class="fill">
                	<img src="image/5.jpg" alt="">
                </div>
            </div>
             <div class="item">
                <div class="fill">
                	<img src="image/6.jpg" alt="">
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" ></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>

    </header>  
    </div>











    <script>
    $('.carousel').carousel({
        interval: 2000
    })
    </script>

<div id="popup1" class="overlay">
	<div class="popup" style="width: 340px;height: 150px;">
		<h2>Select theme</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		<?php	
	
		echo "<form action='theme_act1.php' method='post'> </p>
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
<div class="container-fluid" style="padding-top: 20px">
    <div class="col-md-12" style="border-bottom: 3px solid black; margin-bottom: 10px;">
      <h5>New Arrival</h5>
    </div>




<?php 
//-- NEW ARRIVAL

$wk=mysql_query("SELECT products.name, products.price , p_image.fimage, p_image.stock
                 FROM products
                 INNER JOIN p_image
                 WHERE products.id_prod=p_image.img_id and products.sale='0'
                 ORDER BY products.id_prod DESC 
                 LIMIT 8   
                  ");
while ($wkg=mysql_fetch_array($wk)) {

echo"       <div class='col-md-4'>
              <div class='thumbnail'>
              <a href='###'> <img class='image-responsive' src=product/".$wkg['fimage']. " width='100%'style='height: 280px;'>
                <div class='caption'>
                  <h4 class='pull-right'>". $wkg['price']."</h4>
                  <h4><a href='#''>". $wkg['name']."</a></h4>
                 <p>You can shop in Wear Kapampangan online store by registering  <a target='_blank' href='register.php'>sign up</a>.</p>
                </div>
                
              </div>
            </div>";


}?>
</div>
  <div class='container-fluid'>
      <div class='col-md-12' style='border-bottom: 3px solid black; margin-bottom: 10px;'>
        <h5>On Sale!</h5>
      </div>
<?php
      
//--NAKA SALE
$cj=mysql_query("SELECT products.name, products.price,products.saleprice , p_image.fimage, p_image.stock
                 FROM products
                 INNER JOIN p_image
                 WHERE products.id_prod=p_image.img_id and products.sale='1'
                 ORDER BY products.id_prod DESC 
                   
                  ");
while ($dp=mysql_fetch_array($cj)) {
  echo "         <div class='col-md-4'>
              <div class='thumbnail'>
              <img class='image-responsive' src=product/".$dp['fimage']. " width='100%'style='height: 280px;'>
                <div class='caption'>
                  <h4 class='pull-right'>Original Price:". $dp['price']."</h4><br>
                  <h4 class='pull-right'>Sale Price:". $dp['saleprice']."</h4>
                  <h4><a href='#''>". $dp['name']."</a></h4>
                   <p>You can shop in Wear Kapampangan online store by registering <a target='_blank' href='register.php'>sign up</a>.</p>
                </div>

              </div>
            </div>";

}
?>

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


<div id="popup2" class="overlay">
    <div class="popup" style="width: 340px;height: 150px;">
       
        <a class="close" href="#">&times;</a>
        <div class="content">
         
    
        </div>
       

            </div>
    </div>

   
    </div>
</div>

</html>
</DOCTYPE>

