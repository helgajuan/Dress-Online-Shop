<?php 
require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM pakaian
			WHERE
			code LIKE '%$keyword%' OR
			name LIKE '%$keyword%' OR
			color LIKE '%$keyword%' OR
			size LIKE '%$keyword%' OR
			-- price LIKE $keyword% OR
			description LIKE '%$keyword%'
			";
$pakaian = query($query);

?>
<table>
		<tr class="table-header">
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