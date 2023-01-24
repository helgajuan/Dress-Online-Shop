<?php  
session_start();

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'function.php';

$pakaian = query("SELECT * FROM pakaian ORDER BY code ASC");

if(isset($_POST["search"])){
	$pakaian = search($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Online Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper">
	<div id="sidebar">
		<h1>Rubylicious Store</h1>
		<ul>
			<li><a href="overview.php">Overview</a></li>
			<li><a href="index.php">Products</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>

	<div class="main-content">
	<div class="header-home">
		<a class="header-add" href="add.php">+ Add New</a><br><br>
	<form action="index.php" method="post">
		<input class="header-search" type="text" name="keyword" size="30" autofocus placeholder="Search.." autocomplete="off" id="keyword">
	</form>
	</div>
	<br><br>
	<div id="container">
	<table>
		<tr class="table-header">
			<th>No.</th>
			<th>Code</th>
			<th>Action</th>
			<th>Name</th>
			<th>Color</th>
			<th>Size</th>
			<th>Price</th>
			<th>Photo</th>
			<th>Description</th>
		</tr>
		<?php $i = 1; ?>
		<?php  foreach ($pakaian as $row) : ?>
		<tr class="table-main">
			<td><?= $i; ?></td>
			<td><?= $row["code"]; ?></td>
			<td>
				<div class="edit-action"> <a href="edit.php?code=<?= $row["code"]; ?>">edit</a></div>
				<div class="delete-action" ><a href="delete.php?code=<?= $row["code"]; ?>" onclick="return confirm('Are you sure want to delete this product?');">delete</a></div>
			</td>
			<td><?= $row["name"]; ?></td>
			<td><?= $row["color"]; ?></td>
			<td><?= $row["size"]; ?></td>
			<td><?= $row["price"]; ?></td>
			<td><img src="image/<?= $row["photo"]; ?>" alt="" width="70"></td>
			<td><?= $row["description"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>		
	</table>
	</div>
	</div>
	<div class="footer">
    	<p>Copyright &copy; yenitamelia 221810660@stis.ac.id</p>
    </div>
	</div>
<script src="script.js"></script>
</body>
</html>