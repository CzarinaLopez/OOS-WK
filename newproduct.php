

<script type="text/javascript">
alert("Product Added Successfully");
location="prod.php";
</script>
<?php
include('config.php');
$name=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
$err=$_FILES['image']['error'];
if($err==0){
move_uploaded_file($tmp,$name);
}
$name=$_POST['name'];
$fimg=$_POST['fimage'];
$bimg=$_POST['bimage'];
$simg=$_POST['simage'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$saleprice="Not Sale";
$qry=mysql_query("INSERT INTO products(id_prod,saleprice,name,price)VALUES('','$saleprice','$name','$price')");
$qry1=mysql_query("INSERT INTO p_image(img_id,fimage,bimage,simage,stock)VALUES('','$fimg','$bimg','$simg','$stock')");


header("location:adminprod.php");

?>


