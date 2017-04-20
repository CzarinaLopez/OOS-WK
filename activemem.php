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
if(isset($_GET['ban_id']))
{
$id=$_GET['ban_id'];

$query1=mysql_query("SELECT * FROM banlist where ban_id='$id'");
while($query2=mysql_fetch_array($query1)){

$query3=mysql_query("INSERT into members (mem_id,fname,lname,gender)VALUES('','$query2[fname]','$query2[lname]','$query2[gender]')");
$qry=mysql_query("INSERT into mem_info (info_id,address,contactnum,username,password)VALUES('','$query2[address]','$query2[contact]','$query2[email]','$query2[address]')");


}

$query4=mysql_query("DELETE FROM banlist WHERE ban_id='$id'");




if($query3)
{
header('location:memberdeact.php');
}
}
?>
</body>
</html>