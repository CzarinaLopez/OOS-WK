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
if(isset($_POST['fname'])){
include('config.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];
$image = $_POST['image'];
$month= $_POST['month'];
$day=$_POST['day'];
$year= $_POST['year'];
$strings= array($contact);
$num_length = strlen((string)$contact);
$num_length1 = strlen((string)$password);
if($num_length1 >=4 && $num_length1 <=15 ){


foreach($strings as $testcase){
  if(ctype_digit($testcase) && $num_length == 10){
      $query = "SELECT * FROM mem_info WHERE username = '$username'";
  $result = mysql_query($query) or die(mysql_error());
  $count = mysql_num_rows($result);
  
if($count==1){
  echo " 
  <div class='page-alerts'>
   <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> Username is already taken!
    </div>
    </div>";
  
}
  else 
    { 
$query1 = mysql_query("INSERT INTO admin (id,username,password,image,fname,lname,month,day,year,address,contact,gender) 
  VALUES('','$username','$password','$image','$fname','$lname','$month','$day','$year','$address','$contact','$gender')");

  if($query1){
  echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <button type='button' class='close'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
        <img src='image/success.png' style='height:15px; width:15px;'>You successfully Registered.
    </div>
    </div>";
  }
  }
  }else{
   echo " 
  <div class='page-alerts'>
 <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> Contact number is incorrect!
    </div>
    </div>";
  }
}
}else{
  echo " 
  <div class='page-alerts'>
      <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> Password Must contain 4-15 characters!
    </div>    </div>";
}
?>
<?php 
include('config.php');
$query=mysql_query("SELECT * FROM theme");
while ($query1=mysql_fetch_array($query)) {
$style=$query1['css'];
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
<script src="js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript"> 
  $(function(){
  
      $('#image').change( function(event) {
                          var tmppath = URL.createObjectURL(event.target.files[0]);
                          $(".col-sm-5 img").fadeIn("fast").attr('src',tmppath);
     
      });
  });  
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

<div class="container">  
    <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top: 100px;">
        <div class="panel panel-info" >
            <div class="panel-heading" style="background-color: black!important;padding: 0;">
                <div class="panel-title" style="background-color: black!important; padding: 10px;">REGISTER</div>
            </div> 
            <div class="panel-body" >
            <form action = "" method = "POST" id="signupform" class="form-horizontal" role="form">

                                <div class="form-group">
                                    
                                    <div class="col-sm-5" >
                                      
                                      <input type="file" id="image" name="image"><br><br>
  
  <img src="" style="width: 110px; height: 110px;" />
                                    </div>
                                </div>           
                               
                                <div class="form-group">
                                    <label for="email" class="col-sm-1 control-label">Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fname" placeholder="First name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                    </div>
                                     <label for="email" class="col-sm-1 control-label">Birthday(M/D/Y):</label>

                                    <div class="col-sm-5">
                                     <br><br>
  <select name="month" placeholder="month">
    <option value="January">January</option>
    <option value="Febuary">Febuary</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="Decemer">Decemer</option>

  </select>/
    <select name="day">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
     <option value="11">11</option>
      <option value="12">12</option>
       <option value="13">13</option>
        <option value="14">14</option>
         <option value="15">15</option>
          <option value="16">16</option>
           <option value="17">17</option>
            <option value="18">18</option>
             <option value="19">19</option>
              <option value="20">20</option>
              <option value="20">20</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>


     </select>/
    <select name="year">

              <option value="2005">2005</option>
              <option value="2004">2004</option>
              <option value="2003">2003</option>
              <option value="2002">2002</option>
              <option value="2001">2001</option>
              <option value="2000">2000</option>
              <option value="1999">1999</option>
              <option value="1998">1998</option>
              <option value="1997">1997</option>
              <option value="1996">1996</option>
              <option value="1995">1995</option>
              <option value="1994">1994</option>
              <option value="1993">1993</option>
              <option value="1992">1992</option>
              <option value="1991">1991</option>
              <option value="1990">1990</option>
  </select>
                                    </div>
                                </div>            
                                <div class="form-group">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-sm-2 control-label">Address:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="address" placeholder="Complete Address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact" class="col-md-3 control-label">Contact#:<img src="image/flag.png" style="width: 25px; height: 25px;"> &nbsp; +63</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="contact" placeholder="contact" maxlength="10">
                                    </div>
                                
                                    <label for="gender" class="col-sm-1 control-label">Gender</label>
                                    <div class="col-sm-2">
                                        <select name="gender">
                                            <option>Female</option>
                                            <option>Male</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>

                                    <input  type = "submit" name = "submit" value = "Sign up" /></br>  
        </div>
    </div>


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


