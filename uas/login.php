<?php 
session_start();
require 'function.php';

if(isset($_COOKIE['id'])&&isset($_COOKIE['key'])){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

		if($key===hash('sha256', $row['username'])){
			$_SESSION['login'] = true;
		}
}

if(isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}


if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if(mysqli_num_rows($result)===1){
		
		$row = mysqli_fetch_assoc($result);
			if(password_verify($password, $row["password"])){
				$_SESSION["login"] = true;

				if(isset($_POST["remember"])){
					setcookie('id', $row['id'], time()+60*60*24);
					setcookie('key', hash('sha256', $row['username']), time()+60*60*24);
				}

				header("Location: index.php");
				exit;
			}
	}

	$error = true;
}

if(isset($error)){
	echo "
			<script>
				alert('Username or password was wrong');
			</script>
		";
}

if (isset($_POST["register"])) {
	if (registration($_POST)>0) {
		echo "
			<script>
				alert('A new user has been added');
			</script>
		";
	} else{
			echo mysqli_error($conn);
		}
	
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Login and Register Page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
			<div class="formbox">
			<div class="buttonbox">
				<div id="btn-reglog"></div>
				<button type="button" class="buttonhead" onclick="login()">Login</button>
				<button type="button" class="buttonhead" onclick="register()">Register</button>
			</div>
	<form action="login.php" method="post" id="login" class="reglog-group">
	<h1 class="login">Login</h1>
		<ul class="logregist">
			<li>
				<input class="logregist" type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>
			</li>
			<li>
				<input class="logregist" type="password" name="password" id="password" placeholder="Password" required>
			</li>
			<li>
				<input type="checkbox" name="remember" id="remember" class="remember">
				<label for="remember" class="rem-label">Remember password</label>
			</li>
			<li>
				<button class="logregist" type="submit" name="login">Login</button>
			</li>
		</ul>
	</form>
		<form action="login.php" method="post" id="register" class="reglog-group">
		<h1 class="regist">Registration</h1>
			<ul class="logregist">
				<li>
					<input class="logregist" type="text" name="name" placeholder="Name" autocomplete="off" required>
				</li>
				<li>
					<input class="logregist" type="text" name="username" placeholder="Username" autocomplete="off" required>
				</li>
				<li>
					<input class="logregist" type="password" name="password" placeholder="Password" required>
				</li>
				<li>
					<input class="logregist" type="password" name="password2" placeholder="Confirm Password" required>
				</li>
				<li>
					<button class="logregist" type="submit" name="register">Register</button>
				</li>
			</ul>
		</form>
		<div class="socialmed">
				<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
		</div>

	<div class="tittle-reglog">
		<h1>Only For Admin</h1>
		<h3>Rubylicious Store</h3>
	</div>
	<div class="container scroll dragscroll">
            <div class="card slide">
                <div class="card-horizontal">
                        <img class="image-slider" src="image/login-bg1.jpg" alt="Card image">
                </div>
            </div>
            <div class="card slide">
                <div class="card-horizontal">
                        <img class="image-slider" src="image/login-bg2.jpg" alt="Card image">
                </div>
            </div>
            <div class="card slide">
                <div class="card-horizontal">
                        <img class="image-slider" src="image/login-bg3.jpg" alt="Card image">
                </div>
            </div>
            <div class="card slide" style="display: inline-block;">
                <div class="card-horizontal">
                        <img class="image-slider" src="image/login-bg4.png" alt="Card image">
                </div>
            </div>
    </div>
    <div class="footer">
    	<p>Copyright &copy; yenitamelia 221810660@stis.ac.id</p>
    </div>
<script>
	var x = document.getElementById("login");
	var y = document.getElementById("register");
	var z = document.getElementById("btn-reglog");

	function register(){
		x.style.left = "-400px";
		y.style.left = "35px";
		z.style.left = "95px";
	}

	function login(){
		x.style.left = "35px";
		y.style.left = "400px";
		z.style.left = "0px";
	}
</script>
</body>
</html>