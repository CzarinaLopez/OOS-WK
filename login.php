<?php
session_start();
include('config.php');

if(isset($_POST['username']) && isset($_POST['password'])){
 $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM mem_info WHERE username = '$username' and password = '$password'";
    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
if (isset($_POST['username']) and isset($_POST['password']))
    {
        
        
            $username = $_POST['username'];
            $password = $_POST['password'];
            
        if ($count == 1)
            {
                $cj=mysql_query("SELECT * FROM mem_info where username='$username'");
                $dp=mysql_fetch_array($cj);
                $id=$dp['info_id'];
                $w=mysql_query("SELECT * FROM members WHERE mem_id='$id'");
                $k=mysql_fetch_array($w);

                if($k['status']=='1'){

                $_SESSION['username'] = $username;
                $username = $_SESSION['username'];
                header("location:welcome.php");
                }else{
                echo " 
  <div class='page-alerts'>
 <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'> This account is deactiveted by admin. 
     <a class='close' href='login.php'>&times;</a></div>
    </div>";
    
                }
}
            
            
        else if(isset($_POST['username']) and isset($_POST['password']))
            {
          echo " 
  <div class='page-alerts'>
 <div class='alert alert-danger page-alert' id='alert-4'>
 <img src='image/warning.png' style='height:15px; width:15px;'>Username or password is incorrect!
     <a class='close' href='login.php'>&times;</a></div>
    </div>";
    
    }
    


    }
}
   
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
        position: relative;top: 220px;
}

.page-alerts .page-alert {
    border-radius: 0;
    margin-bottom: 0;
}
</style>
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
           
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li style="margin-right: 20px;"><a href="login.php" class="glyphicon glyphicon-log-in">&nbsp;Login</a></li>
            </ul>
        </div>
    </div>
</nav>
</div>

<div class="container">	 
	<form action = "" method = "POST">
        <div id="loginbox" >                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Registered Costumer</div> 
                </div> 

                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>  
                            <form id="loginform" class="form-horizontal" role="form" >
                                    
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="username" placeholder="username">
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                    <input  type = "submit" name = "submit" value = "Login" /></br>
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                            <a href="register.php">
                                            Sign Up Here
                                            </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>

                    </div>   
                  </div>
        </div>
</form>        

</body>
</html>