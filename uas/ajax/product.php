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
		<tr class="table-main overview">
			<td><?= $i; ?></td>
			<td><?= $row["code"]; ?></td>
			<td>
				<div class="edit-action"> <a href="edit.php?code=<?= $row["code"]; ?>">edit</a></div>
				<div class="delete-action" ><a href="delete.php?code=<?= $row["code"]; ?>" onclick="return confirm(' sure want to delete this product?');">delete</a></div>
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