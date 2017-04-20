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



<body style="margin-top: 200px">
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
                <li ><a href="index.php" class="glyphicon glyphicon-home" >&nbsp;Home</a></li>
                <li class="active"><a href="product.php" class="glyphicon glyphicon-shopping-cart">&nbsp;Shop</a></li>
                <li><a href="about.php" class="	glyphicon glyphicon-info-sign">&nbsp;About</a></li>
               	<li><a href="#popup1">Theme</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li style="margin-right: 20px;"><a href="login.php" class="glyphicon glyphicon-log-in">&nbsp;Login</a></li>
            </ul>
        </div>
    </div>
</nav>


<div id="popup1" class="overlay" >
	<div class="popup" style="width: 340px;height: 150px;">
		<h2>Select theme</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		<?php	
	
		echo "<form action='themeproduct.php' method='post'> </p>
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

<div class="container-fluid">


    <?php
    session_start();
    include('config.php');



    $query1=mysql_query("select products.name, p_image.fimage, products.price,products.id_prod, p_image.stock from p_image 
        inner join products 
        on products.id_prod=p_image.img_id 
        ORDER BY products.id_prod DESC");

    while($query2=mysql_fetch_array($query1))

    {
    echo"
        <div class='col-md-4' style='margin-top:30px;'>
              <div class='thumbnail'>
               <img class='image-responsive' src=product/".$query2['fimage']. " width='100%'style='height: 280px;'>
                <div class='caption'>
                  <h4 class='pull-right'>". $query2['price']."</h4>
                  <h4><a href='#''>". $query2['name']."</a></h4>
                 <p>You can shop in Wear Kapampangan online store by registering  <a target='_blank' href='register.php'>sign up</a>.</p>
                
              
           ";

    ?>

                <?php
echo "<div class='ratings'>
                
                  <p>";

        
           
            $w=mysql_query("SELECT love FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count=$k['love'];
            echo"
            <p class=' glyphicon glyphicon-heart'>$count &nbsp;</p>";
            $w=mysql_query("SELECT * FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count1=$k['thumbsup'];
            echo"
            <p class='glyphicon glyphicon-thumbs-up'>$count1 &nbsp;</p>";
            $w=mysql_query("SELECT * FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count2=$k['unlike'];
            echo"
            <p class='glyphicon glyphicon-thumbs-down'>$count2 &nbsp;</p>

            <a href=#popup2?id_prod=".$query2['id_prod']." '><input id='atc' type = 'submit' name ='submit' value = 'View' /></a>
    
            </div>
               </div>
            </div>";
          

            
             ?>

   

    <div id="popup2?id_prod=<?php echo "$query2[id_prod]";?>" class="overlay">


        <div class="popup" style="
    height: 365px;
">
            
            <a class="close" href="#popup2">&times;</a>
            <div class="content">
  <?php 
                $stck=0;
                $drg=mysql_query("SELECT * FROM p_image WHERE img_id='$query2[id_prod]'");
                while ($exp=mysql_fetch_array($drg)) {
                    $stck=$exp['stock'];
                }
    echo "  

<img id='view' src=product/".$query2['fimage']. " style='height:350;'>
        <div id='option'>
        <div id='name'>
                <p>$query2[name]</p>
        </div>
        <img src='image/line.png' style='width: 330px; height: 10px;'>
            <p align='justify'>Please register before you can add this product to your cart. Thank you. Enjoy shopping. :) </p>
            <p style='font-size:20px; margin:0px;'>&#8369;$query2[price].00 || $stck&nbsp;stocks left
 <img src='image/line.png' style='width: 330px; height: 10px; margin-top:15px;'>

   

        </div>";?>
            </div>
        </div>
    </div>
    </div>
 

    <?php 
    
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