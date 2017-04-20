<DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/edit.css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript"> 
  $(function(){
  
      $('#fimage').change( function(event) {
                          var tmppath = URL.createObjectURL(event.target.files[0]);
                          $(".fimage img").fadeIn("fast").attr('src',tmppath);
     
      });
  });  
  </script>
  <script type="text/javascript"> 
  $(function(){
  
      $('#bimage').change( function(event) {
                          var tmppath = URL.createObjectURL(event.target.files[0]);
                          $(".bimage img").fadeIn("fast").attr('src',tmppath);
     
      });
  });  
  </script>
    <script type="text/javascript"> 
  $(function(){
  
      $('#simage').change( function(event) {
                          var tmppath = URL.createObjectURL(event.target.files[0]);
                          $(".simage img").fadeIn("fast").attr('src',tmppath);
     
      });
  });  
  </script>
</head>
	
<body background="image/background.jpg">
	<img id="logo" src="logo.jpg" />
	<ul>
	
		<li><a  href="prod.php"><img img id="back" src="image/back.png"></a></li>
	</ul>
</html>
<?php

include('config.php');

{
$id=$_GET['id_prod'];

if(isset($_POST['submit']))
{
$productname=$_POST['productname'];

$price=$_POST['price'];
$fimages=$_POST['fimage'];
$bimages=$_POST['bimage'];
$simages=$_POST['simage'];
$stock=$_POST['stock'];

$query3=mysql_query("UPDATE products SET name='$productname', price='$price' WHERE id_prod='$id'");
$query4=mysql_query("UPDATE p_image SET fimage='$fimages',bimage='$bimages',simage='$simages', stock='$stock' WHERE img_id='$id'");

$message = "Edit Done";
  echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>window.location.assign('adminprod.php')</script>";
}

$query1=mysql_query("SELECT products.name, p_image.fimage, products.price,products.id_prod, p_image.stock FROM 
	p_image 
	INNER JOIN products
	ON products.id_prod=p_image.img_id
	WHERE products.id_prod='$id'
	");
$query2=mysql_fetch_array($query1);
?>
	<fieldset id="fs">
<form method="post" action="">
	<div class="edit">
	<table>
	<legend>UPDATE</legend>


			<tr><td class="fimage">
		Upload Image(Front Picture):&nbsp;<input type="file" name="fimage" id="fimage" required /> 
  <img src="" style="width: 110px; height: 110px;" />
</td>
<td class="bimage">
            Upload Image(Back Picture):&nbsp;<input type="file" name="bimage" id="bimage" required /> 
  <img src="" style="width: 110px; height: 110px;" />
    </td>
         <td class="simage">   
             Upload Image(Side Picture):&nbsp;<input type="file" name="simage" id="simage" required />

  <img src="" style="width: 110px; height: 110px;" />
	</td>	</tr>	
	<tr><td><h3>Price:</h3>
			<input type="text" name="price" value="<?php echo $query2['price']; ?>" placeholder="price" required />
			</td></tr>
	
		<tr><td><h3>productname:</h3>
			<input type="text" name="productname" value="<?php echo $query2['name']; ?>" placeholder="productname" required/></td></tr>
		
		<tr><td><h3>stock</h3>
		<input type="text" name="stock" value="<?php echo $query2['stock']; ?>" placeholder="stock" required/></td></tr>
	<div>
			<td><input type="submit" name="submit" value="update" /></td>
	</div>
	</table>

	</fieldset>
</div>
</form>
<?php
}?>

