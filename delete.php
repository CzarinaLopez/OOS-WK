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
if(isset($_GET['mem_id']))
{
$id=$_GET['mem_id'];
$query2=mysql_query("DELETE FROM mem_info WHERE info_id='$id'");
$query1=mysql_query("DELETE FROM members WHERE mem_id='$id'");

if($query2)
{
header('location:member.php');
}
}
?>
</body>
</html>