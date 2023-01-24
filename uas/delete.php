<?php 
session_start();

if(!isset($_SESSION['login'])){
	header("Location: login.php");
	exit;
}

require 'function.php';

$code = $_GET["code"];

if(delete($code)>0){
	echo"
			<script>
				alert('Product has been deleted');
				document.location.href = 'index.php';
			</script>
		";
	} else{
		echo"
			<script>
				alert('Failed to delete the product');
				document.location.href = 'index.php';
			</script>
		";
	}

 ?>