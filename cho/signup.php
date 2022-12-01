<?php 
include 'config.php';
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				echo "<script>alert('User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="signup.css" rel="stylesheet" type="text/css">
	<link href="logo.png" rel="icon">
	<title>Sign up</title>
</head>
<body>
		<form action="" method="POST" class="form">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign up</p>
				<input type="text" placeholder="Username" name="username"required>
				<input type="email" placeholder="Email" name="email"required>
				<input type="password" placeholder="Password" name="password" required>
				<input type="password" placeholder="Confirm Password" name="cpassword" required>
				<button name="submit" class="button">Signup</button>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a></p>
		</form>
	</div>
</body>
</html>