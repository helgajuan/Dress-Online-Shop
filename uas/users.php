<?php  
session_start();

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'function.php';

$users = query("SELECT * FROM user ORDER BY name ASC");

?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Users</title>
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
	<h2 class="header-overview">Admin</h2>
	</div>
	<br><br>
	<div class="header-home-total">
	<h4 class="total">Total Admin : <?= $count; ?></h4>
	</div>
	<div id="containerUsers">
	<table>
		<tr class="table-header user">
			<th>Name</th>
			<th>Username</th>
		</tr>
		<?php  foreach ($users as $row) : ?>
		<tr class="table-main users">
			<td ><?= $row["name"]; ?></td>
			<td ><?= $row["username"]; ?></td>
		</tr>
		<?php endforeach; ?>

			
	</table>
	</div>
	</div>
	</div>
	<div class="footer">
    	<p>Copyright &copy; by yenitamelia 221810660@stis.ac.id</p>
    </div>
</body>
</html>