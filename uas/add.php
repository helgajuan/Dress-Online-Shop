<?php 
session_start();

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'function.php';

if(isset($_POST["submit"])){


	if(add($_POST)>0){
		echo"
			<script>
				alert('New product has been added');
				document.location.href = 'index.php';
			</script>
		";
	} else{
		echo"
			<script>
				alert('Failed to add new product');
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
	<title>Add Product</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="addbox">
	<form action="add.php" method="post" class="add-group" enctype="multipart/form-data">
	<h1 class="add">Add New Product</h1>
		<ul class="add-prod">
			<li>
				<input class="add-prod" type="text" name="code" placeholder="Code" autocomplete="off" required>
			</li>
			<li>
				<input class="add-prod" type="text" name="name" placeholder="Name" autocomplete="off" required>
			</li>
			<li>
				<input class="add-prod" type="text" name="color" placeholder="Color" autocomplete="off" required>
			</li>
			<li>
				<input class="add-prod" type="text" name="size" placeholder="Size" autocomplete="off" required>
			</li>
			<li>
				<input class="add-prod" type="text" name="price" placeholder="Price" autocomplete="off" required>
			</li>
			<li>
				<input class="add-prod" type="text" name="description" autocomplete="off" placeholder="Description">
			</li>
			<li>
				<input class="choose-image-add" type="file" name="photo" required>
			</li>
			<li>
				<button class="add-prod" type="submit" name="submit">Add New Product</button>
			</li>
			
		</ul>
	</form>
	</div>
	<div class="add-image">
		<img src="image/k6.png" alt="">
	</div>
	<div class="back">
		<a class="backn" href="index.php">Back</a>
	</div>
	<div class="footer">
    	<p>Copyright &copy; yenitamelia 221810660@stis.ac.id</p>
    </div>
</body>

</html>