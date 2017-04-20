<!DOCTYPE html>
<style type="text/css">
td
{
padding: 5px;
border: 1px solid #ccc;
}
</style>
</head>
<body>

<?php
include('config.php');
$user=$_GET['user'];
$query1=mysql_query("DELETE  FROM cart WHERE user='$user'");
if($query1)
{
header('location:cart.php');
}

?>
</body>
</html>