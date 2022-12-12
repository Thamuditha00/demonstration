<?php 
include 'config.php';
error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['login'])) {
	$username = $_POST['username'];

	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	$arr = $result->fetch_array();
	if (password_verify($_POST['password'], $arr['password']) && str_contains($arr['ID'], 'cho')) {
		$_SESSION['username'] = $username;
		$_SESSION['userType'] = 'cho';
		header("Location: index.php");
	} else {
		echo "<script>alert('Email or Password is Wrong.')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="signup.css" type="text/css" rel="stylesheet">
	<link rel="icon" href="logo.png">
	<title> Login </title>
</head>
<body>
	<div class="login-page">
		<form action="" method="POST" class="form">
			<p class="login-text" style="font-size: 2rem; font-weight: 800; text-align:center;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="username" name="username">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password">
			</div>
			<div class="input-group">
				<button name="login" class="button">Login</button></center>
			</div>
			<p class="login-register-text">Don't have an account? Contact admin for registration</p>
		</form>
	</div>
</body>
</html>