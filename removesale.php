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

$saleprice="Not Sale";

$query3=mysql_query("UPDATE products SET saleprice='$saleprice',sale='0' WHERE id_prod='$id'");

}
echo"<script type='text/javascript'>
alert('Removed Sale');
location='adminprod.php#popup1?id=$id';
</script>
";
?>
</body>
</html>