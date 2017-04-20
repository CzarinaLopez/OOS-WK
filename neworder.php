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
            <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Date Order</th>
                <th>Ordered By</th>
           <th>Action</th>
           
            </tr>
        </thead>
        
<?php
include('config.php');
if(isset($_GET['send']))
{
$id=$_GET['send'];

 echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <img src='image/success.png' style='height:15px; width:15px;'>RECORD UPDATED
    </div>
    </div>";
$w=mysql_query("UPDATE orders SET status='1' WHERE order_id='$id'");



        

}
?>
        <?php 

include('config.php');


$query1=mysql_query("SELECT orders.o_name,orders.o_size,orders.o_price,i_order.quantity, i_order.dateorder,orders.mem_id , orders.order_id
    FROM i_order
    INNER JOIN orders
      ON orders.order_id=i_order.oi_id
      WHERE orders.status='0'
      ORDER BY orders.order_id DESC ");





while($query2=mysql_fetch_array($query1))

{
    echo "<tr><td>$query2[order_id]</td>";
echo "<td>$query2[o_name]</td>";
echo "<td>".$query2['o_price']."</td>";
echo "<td>".$query2['o_size']."</td>";
echo "<td>".$query2['quantity']."</td>";
echo "<td>".$query2['dateorder']."</td>";
$g=mysql_query("SELECT * FROM members WHERE mem_id='$query2[mem_id]'");
$s=mysql_fetch_array($g);
echo "<td>$s[fname]</td>";
echo "<td><button class='btn btn-inverse'><a href='neworder.php?send=$query2[order_id]' style='color:white;'><i class=' glyphicon glyphicon-check'></i></a></button>";






echo"</div>";

}


        ?>
        </tbody>
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