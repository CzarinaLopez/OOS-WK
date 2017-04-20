<!DOCTYPE html>

<?php
include("config.php");
session_start();
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
?>
<?php
include('config.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
    $c=mysql_query("SELECT * FROM admin WHERE id='$id'");
    $j=mysql_fetch_array($c);
    if($j['status']=='1'){
  echo " 
  <div class='page-alerts'>
 <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> CANT DELETE THE MAIN ADMIN!
    </div>
    </div>";
    }else{

  echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <button type='button' class='close'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
        <img src='image/success.png' style='height:15px; width:15px;'>$j[username] is now deleted
    </div>
    </div>";
        $z=mysql_query("DELETE FROM admin WHERE id='$id'");

    }
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
  <style>
@import url('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');

button {
    margin-bottom: 3px;
}


/* REQUIRED */
.page-alerts {
    margin-bottom: 20px;
        position: relative;top:110px;left: 670px;
        width: 500px;
}

.page-alerts .page-alert {
    border-radius: 0;
    margin-bottom: 0;
}
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
               


<?php

include('config.php');


$query1=mysql_query("SELECT * from admin ");

echo"<table class='table table-hover' style='margin-top:7%;'>
        <tr style='margin-top:7%; background-color: gray; color: white;'>    
            <th>First name</th>
            <th>Last name</th>
            <th>Birthday</th>
                <th>Gender</th>
            <th>contact</th>
        
         <th>username</th>
            <th>password</th>
            <th>action</th>
        
        </tr>";

while($query2=mysql_fetch_array($query1))

{
echo "<tr><td>".$query2['fname']."</td>";
echo "<td>".$query2['lname']."</td>";
echo "<td>$query2[month] $query2[day], $query2[year]</td>";
echo "<td>".$query2['gender']."</td>";
echo "<td>".$query2['contact']."</td>";
echo "<td>".$query2['username']."</td>";
echo "<td>".$query2['password']."</td>";
echo "<td>
<button class='btn btn-inverse'><a href='adminaccount.php?id=".$query2['id']." ' style='color:white;'><i class=' glyphicon glyphicon-trash'>DELETE</i></a></button>


    
</td></tr>

    ";



echo"</div>";


}



?>
</table>


                </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
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
