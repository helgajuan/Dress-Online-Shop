<?php 

$conn = mysqli_connect("localhost", "root", "12345", "dbpakaian");

function query($query){
	global $conn;
	global $count;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	$count = count($rows);
	return $rows;
}

function add($data){
	global $conn;

	$code = htmlspecialchars($data["code"]);
	$name = htmlspecialchars($data["name"]);
	$color = htmlspecialchars($data["color"]);
	$size = htmlspecialchars($data["size"]);
	$price = htmlspecialchars($data["price"]);

	$photo = upload();
	if (!$photo) {
		return false;
	}

	$description = htmlspecialchars($data["description"]);

	$query = "INSERT INTO pakaian VALUES
				('$code', '$name', '$color', '$size', '$price', '$photo', '$description')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function delete($code){
	global $conn;
	mysqli_query($conn, "DELETE FROM pakaian WHERE code = '$code'");
	return mysqli_affected_rows($conn);
}

function edit($data){
	global $conn;

	$code = $data["code"];
	$name = htmlspecialchars($data["name"]);
	$color = htmlspecialchars($data["color"]);
	$size = htmlspecialchars($data["size"]);
	$price = htmlspecialchars($data["price"]);
	$lastPhoto = $data["lastPhoto"];
	$photo = htmlspecialchars($data["photo"]);
	$description = htmlspecialchars($data["description"]);

	if($_FILES['photo']['error']===4){
		$photo = $lastPhoto;
	} else{
		$photo = upload();
	}

	$query = "UPDATE pakaian SET
					name = '$name',
					color = '$color',
					size = '$size',
					price = $price,
					photo = '$photo',
					description = '$description'
					WHERE code = '$code'
					";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function search($keyword){
	$query = "SELECT * FROM pakaian
				WHERE
				code LIKE '%$keyword%' OR
				name LIKE '%$keyword%' OR
				color LIKE '%$keyword%' OR
				size LIKE '%$keyword%' OR
				-- price LIKE $keyword% OR
				description LIKE '%$keyword%'
				";
	return query($query);
}

function upload(){
	$namaFile = $_FILES['photo']['name'];
	$ukFiles = $_FILES['photo']['size'];
	$error = $_FILES['photo']['error'];
	$tmpName = $_FILES['photo']['tmp_name'];

	if ($error===4) {
		echo "
			<script>
				alert('Choose an image');
			</script>
		";
		return false;
	}

	$ekstensiGbrValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGbr = explode('.', $namaFile);
	$ekstensiGbr = strtolower(end($ekstensiGbr));
	if(!in_array($ekstensiGbr, $ekstensiGbrValid)){
		echo "
			<script>
				alert('An uploaded file wasn't an image);
			</script>
		";
		return false;
	}

	if($ukFiles > 1000000){
		echo "
			<script>
				alert('The size was overloaded');
			</script>
		";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGbr;

	move_uploaded_file($tmpName, 'image/'.$namaFileBaru);

	return $namaFileBaru;
}

function registration($data){
	global $conn;
	$name = strtolower(stripcslashes($data["name"]));
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)){
		echo "
			<script>
				alert('This username is already taken');
			</script>
		";
		return false;
	}

	if($password !== $password2){
		echo "
			<script>
				alert('Password was not appropriate');
			</script>
		";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_query($conn, "INSERT INTO user VALUES('', '$name', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

?>
