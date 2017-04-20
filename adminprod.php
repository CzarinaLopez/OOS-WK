<!DOCTYPE html>
<?php
include("config.php");
session_start();
$username=$_SESSION['username'];
if(isset($_SESSION['username']))
{
if(!$_SESSION['username']=='admin')
{
header("Location:adminlogin.php?id=You are not authorized to access this page unless you are administrator of this website");
}
}
else
{
header("Location:adminlogin.php?id=You are not authorized to access this page unless you are administrator of this website");
}

?>
<?php 
include("config.php");

?>
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
<script language="JavaScript" src="//code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<style>
@import url('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
</style>

<div id="wrapper">
    
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a>
                <img src="image/logo.png" style="width: 340px; height: 50px;">
            </a>
        </div>

        <ul>
            <li class="navbar-nav"></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="adminlogout.php"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    
    
        <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1" class=" glyphicon glyphicon-user"><i class="fa fa-fw fa-search"></i> PROFILES <i class="fa fa-fw fa-angle-down pull-right" ></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="adminaccount.php"><i class="fa fa-angle-double-right"></i> Admin</a></li>
                        <li><a href="member.php"><i class="fa fa-angle-double-right"></i> Member</a></li>
                        <!--li><a href="memberdeact.php"><i class="fa fa-angle-double-right"></i> Member (Deactivated)</a></li-->
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2">  PRODUCTS <i class="fa fa-fw fa-angle-down pull-right"></i> </a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="adminprod.php" ><i class="fa fa-angle-double-right"></i> Shirts</a></li>
                        <!--li><a href="#"><i class="fa fa-angle-double-right"></i> New Arrival</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Sale</a></li-->
                    </ul>
                </li>  <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="glyphicon glyphicon-list-alt"></i> ORDERS<i class="fa fa-fw fa-angle-down pull-right"></i> </a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="neworder.php" ><i class="fa fa-angle-double-right"></i>PENDING ORDERS</a></li>
                        <li><a href="sentorder.php"><i class="fa fa-angle-double-right"></i>SENT ORDERS</a></li>
                    </ul>
                </li>
               <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="  glyphicon glyphicon-plus"></i> ADD<i class="fa fa-fw fa-angle-down pull-right"></i> </a>
                    <ul id="submenu-4" class="collapse">
                        <li><a href="add.php" ><i class="fa fa-angle-double-right"></i> For Products</a></li>
                        <li><a href="adminform.php"><i class="fa fa-angle-double-right"></i> For Admin</a></li>
                    </ul>
                </li>
                 <!--li>
                    <a href=#"><i class="fa fa-fw fa-paper-plane-o"></i> MENU 4</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa fa-question-circle"></i> MENU 5</a>
                </li-->
            </ul>
        </div>
        </nav>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" id="main" >
               <br>
               <br>

               <br>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
     <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
                <th>Review</th>
            </tr>
        </thead>
        <?php
include('config.php');
if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$query1=mysql_query("delete from p_image where img_id='$id'");
$query2=mysql_query("delete from products where id_prod='$id'");
if ($query1 && $query2) {
     echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <img src='image/success.png' style='height:15px; width:15px;'>DELETED
   <a class='close' href='adminprod.php'>&times;</a></div>
    </div>";
 } 
}
?>
<?php
include('config.php');
if(isset($_GET['edit']))
{
$id=$_GET['edit'];    
$per=$_POST['sale'];
$percent=".$per";

$query=mysql_query("SELECT * FROM products where id_prod='$id'");
$query2=mysql_fetch_array($query);
$saleprice=$query2['price']-($percent*$query2['price']);

$query3=mysql_query("UPDATE products SET saleprice='$saleprice',sale='1' WHERE id_prod='$id'");
     echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <img src='image/success.png' style='height:15px; width:15px;'>Adding sale($query2[name]) DONE
  <a class='close' href='adminprod.php'>&times;</a> </a> </div>
    </div>";

}
?>

<?php
include('config.php');
if(isset($_GET['remove']))
{
$id=$_GET['remove'];    

$saleprice="Not Sale";

$query=mysql_query("SELECT * FROM products where id_prod='$id'");
$query2=mysql_fetch_array($query);
$query3=mysql_query("UPDATE products SET saleprice='$saleprice',sale='0' WHERE id_prod='$id'");

 echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <img src='image/success.png' style='height:15px; width:15px;'>Remove sale($query2[name]) DONE
   <a class='close' href='adminprod.php'>&times;</a> </div>
    </div>";

}

?>

    <?php

        include('config.php');
        $estprice=0;


        $query1=mysql_query("SELECT  products.name, p_image.fimage, products.price,products.id_prod, p_image.stock, products.sale, products.saleprice from p_image 
            inner join products 
            on products.id_prod=p_image.img_id
            ORDER BY products.id_prod DESC");

        

        while($query2=mysql_fetch_array($query1))

        {
           
        echo "
        <tr>
            <td width='25%' height='5%;'><img src=product/".$query2['fimage']. " ></td>
            <td>".$query2['name']."</td>";
            
           
            if($query2['sale']=='0'){
                 echo "   <td><a href='#popup2?id_prod=$query2[id_prod]' class='btn btn-info btn-lg'>$query2[price].00(NOT SALE)</a></td>";
            }else{
                 echo "   <td><a href='#popup2?id_prod=$query2[id_prod]' class='btn btn-info btn-lg'>$query2[price].00(ON SALE)</a></td>";
            }
    
echo "
            <td>
                <a class='teal-text' href='#editproduct.php?id_prod=".$query2['id_prod']." '> &nbsp;</a>

                <button class='btn btn-inverse'><a href='adminprod.php?delete=".$query2['id_prod']." ' style='color:white;'>&nbsp;<i class=' glyphicon glyphicon-trash'>&nbsp;</i></a></button>

            </td>
                <td><button><a href='#review?id_prod=$query2[id_prod]'>Reviews</a></button></td>
        </tr>
        </div>";
           
            ?>
        
    <div id="popup2?id_prod=<?php echo "$query2[id_prod]";?>" class="overlay">

        <div class="popup" style="width: 400px; height: 200px;">
            
            <a class="close" href="#popup2" >&times;</a>
            <div class="content">
  <?php 
                $stck=0;
                $drg=mysql_query("SELECT * FROM p_image WHERE img_id='$query2[id_prod]'");
                while ($exp=mysql_fetch_array($drg)) {
                    $stck=$exp['stock'];
                }
    echo "  


        <div id='option'>
        <div id='name'>
                <p>$query2[name]</p>
        </div>
        Original Price: $query2[price]<br>
        Sale Price: $query2[saleprice]
        <form action='adminprod.php?edit=$query2[id_prod]' method='post'>
       <br>Enter sale percent:<input type='text' name='sale'>
   <input type='submit' name='submit' value='add sale'>
</form>
<a href='adminprod.php?remove=$query2[id_prod]'>Remove sale</a>
        </div>";
        ?>
            </div>
        </div>
    </div>
    </div>
  <div id="review?id_prod=<?php echo "$query2[id_prod]";?>" class="overlay">


        <div class="popup">
            
            <a class="close" href="##">&times;</a>
            <div class="content">
  <?php         
                $x=mysql_query("SELECT * FROM admin WHERE username='$username'");
                $s=mysql_fetch_array($x);
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
        

        <img src='image/line.png' style='width: 330px; height: 10px; margin-top:10px;'>
      
        </form>
        
     <div class='likes' style='margin-top:-17;'>    

        ";
 
          $w=mysql_query("SELECT love FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count=$k['love'];
            echo"
            <a href='#' class=' glyphicon glyphicon-heart'>$count &nbsp;</a>";
            $w=mysql_query("SELECT * FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count1=$k['thumbsup'];
            echo"
            <a href='#' class='glyphicon glyphicon-thumbs-up'>$count1 &nbsp;</a>";
            $w=mysql_query("SELECT * FROM products where id_prod='$query2[id_prod]'");
            $k=mysql_fetch_array($w);
            $count2=$k['unlike'];
            echo"
            <a href='#' class='glyphicon glyphicon-thumbs-down'>$count2 &nbsp;</a>
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
  <form action='commentadmin.php?id_prod=$query2[id_prod]' method='post'>
       <img src='profilepic/$s[image]' style='height:30px; width:30px;'/> <input type='text' name='comment' placeholder='write a comment'>
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
            
              
    <!-- Modal HTML -->
    <div id='myModal'    class='modal fade'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                    <h4 class='modal-title'></h4>
                </div>
                <div class='modal-body'>
                 </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary' >Save changes</button>
                </div>
            </div>
        </div>
    </div>

    
</tbody>
    </table>        
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    </script>



</body>
</html>

