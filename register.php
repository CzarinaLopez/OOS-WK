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

button {
    margin-bottom: 3px;
}


/* REQUIRED */
.page-alerts {
    margin-bottom: 20px;
        position: relative;top: 220px;
}

.page-alerts .page-alert {
    border-radius: 0;
    margin-bottom: 0;
}
</style>
  </head>
  <?php
  include('config.php');
session_start();
if (isset($_POST['fname'])) {
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
     <a class='close' href='register.php'>&times;</a></div>
    </div>";
  
}
  else 
    { 
$query1 = mysql_query("INSERT INTO members(mem_id,fname,lname,gender,status,profile_pic) VALUES('','$fname','$lname','$gender','1',
  '$image')");
$query1 = mysql_query("INSERT INTO mem_info(info_id,address,contactnum,month,day,year,username,password) VALUES('','$address','$contact','$month','$day','$year','$username','$password')");
  if($query1){

  echo " 
  <div class='page-alerts'>
    <div class='alert alert-success page-alert' id='alert-1'>
        <button type='button' class='close'><span aria-hidden='true'></span><span class='sr-only'>Close</span></button>
        <img src='image/success.png' style='height:15px; width:15px;'>You successfully Registered. Click here to  <a href='login.php'>Login</a>
     <a class='close' href='register.php'>&times;</a></div>
    </div>";
  }
  }
  }else{
  
  echo " 
  <div class='page-alerts'>
 <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> Contact number is incorrect!
     <a class='close' href='register.php'>&times;</a></div>
    </div>";
  }
}
}else{
  
  echo " 
  <div class='page-alerts'>
      <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> Password Must contain 4-15 characters!
     <a class='close' href='register.php'>&times;</a>/div>    </div>";
}
}


?>
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
</div>

<div class="container">	 


    <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">REGISTER</div>
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
                                 <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                           All ready have an account! 
                                        <a href="login.php">
                                            Sign In Here
                                        </a>
                                    </div>
                                </div>
                                </div>  
        </div>
    </div>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Select theme</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
		<?php	
	
		echo "<form action='themelogin.php' method='post'> </p>
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
</html>