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
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query2=mysql_query("DELETE FROM admin WHERE id='$id'");

if($query2)
{
header('location:adminaccount.php');
}
}
?>
</body>
</html>