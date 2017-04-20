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
                <th>Name</th>
                <th>Status</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
include('config.php');
if(isset($_GET['mem_id']))
{
$id=$_GET['mem_id'];
$query=mysql_query("SELECT status FROM members where mem_id='$id'");
$query1=mysql_fetch_array($query);
$stat=$query1['status'];
if($stat=='1')  {
     $query=mysql_query("UPDATE members SET status='0' where mem_id='$id'");
     $c=mysql_query("SELECT * FROM members WHERE mem_id='$id'");
     $j=mysql_fetch_array($c);
    echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        
        <img src='image/success.png' style='height:15px; width:15px;'>$j[fname] is Deactivated
     <a class='close' href='member.php'>&times;</a></div>
    </div>";
}
    else{
 $query=mysql_query("UPDATE members SET status='1' where mem_id='$id'");
   $c=mysql_query("SELECT * FROM members WHERE mem_id='$id'");
     $j=mysql_fetch_array($c);  
 echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <img src='image/success.png' style='height:15px; width:15px;'>$j[fname] is Active
    <a class='close' href='member.php'>&times;</a> </div>
    </div>";
}

}



?>
<?php
include('config.php');
if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$c=mysql_query("SELECT * FROM members WHERE mem_id='$id'");
     $j=mysql_fetch_array($c);
 echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <img src='image/success.png' style='height:15px; width:15px;'>Record of $j[fname] is now DELETED
    </div>
    </div>";
$query2=mysql_query("DELETE FROM mem_info WHERE info_id='$id'");
$query1=mysql_query("DELETE FROM members WHERE mem_id='$id'");


     

}
?>
        <?php 

include('config.php');


$query1=mysql_query("SELECT members.fname, mem_info.contactnum, members.profile_pic,members.status, members.lname,members.gender,members.mem_id, mem_info.username,mem_info.password,mem_info.address ,mem_info.month, mem_info.day, mem_info.year
FROM mem_info 
INNER JOIN members 
ON members.mem_id=mem_info.info_id 
");




while($query2=mysql_fetch_array($query1))

{
echo "<tr><td>$query2[fname] $query2[lname]</td>";

if($query2['status']=='1'){
echo "<td><button class='btn btn-success'><a style='color:white;' href='member.php?mem_id=$query2[mem_id]'>Active</a></button></td>";
}else{
  echo "<td><button class='btn btn-danger'><a style='color:white;' href='member.php?mem_id=$query2[mem_id]'>Deactivated</a></button></td>";
}
echo "<td><button class='btn btn-success'><a href='member.php?#popup1?id=$query2[mem_id]' style='color:white;'>View more</a></button></td>";
echo "<td><button class='btn btn-inverse'><a href='member.php?delete=$query2[mem_id]' style='color:white;'><i class=' glyphicon glyphicon-trash'></i></a></button></td>";




echo"</div>";
echo "<div id='popup1?id=$query2[mem_id]' class='overlay' style='z-index:4;'>
    <div class='popup' style='margin-top: 0px;'>
        <h2> </h2>";
        $password=$query2['password'];
        $hash = crypt($password);
        echo "
        <a class='close' href='#''>&times;</a>
        <div class='content'>
           <img id='view' src='profilepic/$query2[profile_pic]' style='height:350px;' />
           <div id='option' style='margin-top:0;'>
           <h3>Basic info</h3>
           <h5>Name : $query2[fname] $query2[lname]</h5>
           <h5>Gender: $query2[gender]</h5>
           <h5>Birthday: $query2[month] $query2[day] $query2[year]</h5>
           <h5>Contact info</h5>
           <h5>Address: $query2[address]</h5>
           <h5>Cell Number: $query2[contactnum]</h5>
           <h5>Account info</h5>
           <h5>Username: $query2[username]</h5>
           <h5>Password: $hash</h5>
           <h5>Status:";
           if($query2['status']=='1'){
                echo "Active";
           }else{
            echo "Inactive </h5>";
           }
           echo "
           </div>
        </div>
    </div>
</div>";
}


        ?>
        </tbody>
    </table>
    

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