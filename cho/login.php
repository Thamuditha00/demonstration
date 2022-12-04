<?php 
include 'config.php';
session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
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
				<input type="email" placeholder="Email" name="email">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password">
			</div>
			<div class="input-group">
				<button name="submit" class="button">Login</button></center>
			</div>
			<p class="login-register-text">Don't have an account? <a href="signup.php">Sign up here.</a></p>
		</form>
	</div>
</body>
</html>