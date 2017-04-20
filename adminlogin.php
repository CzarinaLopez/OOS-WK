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
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li style="margin-right: 20px;"><a href="login.php" class="glyphicon glyphicon-log-in">&nbsp;LoginCostumer</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">	 
	<form action = "admin-activation.php" method = "POST">
        <div id="loginbox" >                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Admin</div> 
                </div> 

                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>  
                            <form id="loginform" class="form-horizontal" role="form" >
                                    
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="username" placeholder="username"
                                    required>                                        
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                                </div>
                                    <input  type = "submit" name = "submit" value = "Login" /></br>
                                 
                            </form>

                    </div>   
                  </div>
        </div>
</form>        
</body>
</html>