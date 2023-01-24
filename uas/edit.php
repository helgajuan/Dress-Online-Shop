<?php 
session_start();

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'function.php';

$code = $_GET["code"];

$pk = query("SELECT * FROM pakaian WHERE code = '$code'")[0];

if(isset($_POST["submit"])){
	if(edit($_POST)>0){
		echo"
			<script>
				alert('Product has been updated');
				document.location.href = 'index.php';
			</script>
		";
	} else{
		echo"
			<script>
				alert('Failed to update product');
				document.location.href = 'index.php';
			</script>
		";
	}
}


 ?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Edit Product</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<div class="editbox">
	<form action="edit.php" method="post" class="edit-group" enctype="multipart/form-data">
	<h1 class="edit">Edit Product</h1>
		<ul class="edit">
			<li>
				<input type="hidden" name="code" id="code" value="<?= $pk["code"]; ?>">
				<input type="hidden" name="lastPhoto" value="<?= $pk["photo"]; ?>">
			</li>
			<li>
				<label class="edit-label" for="name">Name : </label>
				<input class="edit-prod" type="text" name="name" id="name" required value="<?= $pk["name"]; ?>">
			</li>
			<li>
				<label class="edit-label" for="color">Color : </label>
				<input class="edit-prod" type="text" name="color" id="color" required value="<?= $pk["color"]; ?>">
			</li>
			<li>
				<label  class="edit-label" for="size">Size : </label>
				<input class="edit-prod" type="text" name="size" id="size" required value="<?= $pk["size"]; ?>">
			</li>
			<li>
				<label class="edit-label" for="price">Price : </label>
				<input class="edit-prod" type="text" name="price" id="price" required value="<?= $pk["price"]; ?>">
			</li>
			<li>
				<label class="edit-label" for="description">Description : </label>
				<input class="edit-prod" type="text" name="description" id="description" required value="<?= $pk["description"]; ?>">
			</li>
			<li>
				<img class="edit-prod" src="image/<?= $pk['photo']; ?>" width="50" alt=""><br>
				<input class="choose-image-edit" type="file" name="photo">
			</li>
			<li>
				<button class="edit-prod" type="submit" name="submit">Edit Product</button>
			</li>
		</ul>
	</form>
	</div>
		<div class="edit-image">
		<img src="image/edit-bg.png" alt="">
	</div>
	<div class="back">
		<a class="backn" href="index.php">Back</a>
	</div>
	<div class="footer">
    	<p>Copyright &copy; yenitamelia 221810660@stis.ac.id</p>
    </div>
</body>

</html>