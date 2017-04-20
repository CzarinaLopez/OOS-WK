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
if(isset($_GET['id_prod']))
{
$id=$_GET['id_prod'];
$query1=mysql_query("delete from p_image where img_id='$id'");
$query2=mysql_query("delete from products where id_prod='$id'");
if($query1)
{
header('location:adminprod.php');
}
}
?>
</body>
</html>