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
	<h2 class="header-overview">Overview Products</h2>
	<br><br>
	<form action="overview.php" method="post">
		<input class="header-search" type="text" name="keyword" size="30" autofocus placeholder="Search.." autocomplete="off" id="keyword">
	</form>
	</div>
	<br><br>
	<div class="header-home-total">
	<h4 class="total">Total products : <?= $count; ?></h4>
	</div>
	<div id="containerOverview">
	<table>
		<tr class="table-header over">
			<th>Code</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Color</th>
			<th>Size</th>
			<th>Price</th>
			<th>Description</th>
		</tr>
		<?php  foreach ($pakaian as $row) : ?>
		<tr class="table-main overview">
			<td><?= $row["code"]; ?></td>
			<td><img src="image/<?= $row["photo"]; ?>" alt="" width="90"></td>
			<td><?= $row["name"]; ?></td>
			<td><?= $row["color"]; ?></td>
			<td><?= $row["size"]; ?></td>
			<td><?= $row["price"]; ?></td>
			<td><?= $row["description"]; ?></td>
		</tr>
		<?php endforeach; ?>

			
	</table>
	</div>
	</div>
	<div class="footer">
    	<p>Copyright &copy; yenitamelia 221810660@stis.ac.id</p>
    </div>
	</div>
<script src="scriptOverview.js"></script>
</body>
</html>