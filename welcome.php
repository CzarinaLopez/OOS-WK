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
$g=mysql_query("SELECT * FROM cart WHERE user='$username'");
while ($s=mysql_fetch_array($g)) {
    $ctr++;
}


?>
<?php
include('config.php');

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
        <button type='button' class='close'><span aria-hidden='true'></span><span class='sr-only'>Close</span></button>
        <img src='image/success.png' style='height:15px; width:15px;'>$query4[name] is Added to your cart
     <a class='close' href='welcome.php'>&times;</a></div>
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
                <li class="active"><a href="welcome.php" >&nbsp;Shirt</a></li>
                <li><a href="cart.php" >&nbsp;My Cart<?php echo"($ctr)";?></a></li>            </ul>
            <ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">
                 <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" glyphicon glyphicon-menu-hamburger"></i>&nbsp;<?php 
$j=mysql_query("SELECT * FROM mem_info WHERE username='$username'");
$c=mysql_fetch_array($j);
$g=mysql_query("SELECT * FROM members WHERE mem_id='$c[info_id]'");
$s=mysql_fetch_array($g); echo "$s[fname]";?> <b class="fa fa-angle-down" ></b></a>
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
             <a href=#popup2?id_prod=".$query2['id_prod']." '><input type ='submit' name ='submit' value = 'View' /></a></div>
               </div>
            </div>";
          

            
             ?>

   

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
  echo "<img id='view' src=product/".$query2['fimage']. ">
    <div id='option' style=' font-family:Segoe Print;'>
    <div id='name'>
                <p>$query2[name]</p>
        </div>
        <img src='image/line.png' style='width: 330px; height: 10px;'>
        <p align='justify'>Enjoy shopping. :) </p>
            <p style='font-size:15px; margin:0px;'>&#8369;$query2[price].00 || $stck&nbsp;stocks left
<form action='welcome.php?id_prod=$query2[id_prod]' method='post'> </p>
<div id='size' style='margin-top:-15;'>
                Size:
                <select name='size'>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>X-large</option>
                </select>
        <input style='margin-top: 20px;' id='atc' type = 'submit' name ='submit' value = 'add to cart' />
        </div>
          

        <img src='image/line.png' style='width: 330px; height: 10px; margin-top:10px;'>
      
        </form>
        
     <div class='likes' style='margin-top:-17;'>    

        ";
 
          $w=mysql_query("SELECT love FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count=$k['love'];
            echo"
            <a href='love.php?id=$query2[id_prod]' class=' glyphicon glyphicon-heart'>$count &nbsp;</a>";
            $w=mysql_query("SELECT * FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count1=$k['thumbsup'];
            echo"
            <a href='like.php?id=$query2[id_prod]' class='glyphicon glyphicon-thumbs-up'>$count1 &nbsp;</a>";
            $w=mysql_query("SELECT * FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count2=$k['unlike'];
            echo"
            <a href='unlike.php?id=$query2[id_prod]' class='glyphicon glyphicon-thumbs-down'>$count2 &nbsp;</a>
            </div>

       <div id='comments'>      ";
          
  $j=mysql_query("SELECT * FROM comments Where id_prod='$query2[id_prod]'");
 while ($c=mysql_fetch_array($j)) {
  echo"   
 <div class='comment'>
    <img src='profilepic/$c[pic]' style='height:30px; width:30px;' ></img><b>&nbsp; $c[user]</b> : $c[content]
  </div> 
  ";

 } 
echo "  

</div>
  <form action='comment.php?id_prod=$query2[id_prod]' method='post'>
       <img src='profilepic/$s[profile_pic]' style='height:30px; width:30px;'/> <input type='text' name='comment' placeholder='write a comment'>
        <input type='submit' value='comment'>
</form>

      </div>";
    ?>
            </div>
        </div>
    </div>
    </div>
 

    <?php 
    
    
    }
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