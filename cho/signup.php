<?php 
include 'config.php';
error_reporting(0);

if (isset($_POST['register'])) {
	$id = uniqid('cho', true);
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


	try {
		$sql = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$password')";
		if($conn->query($sql) === TRUE) {
			header("Location: login.php");
		}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
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
				<input type="password" placeholder="Password" name="password" required>
				<button name="register" class="button">Signup</button>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a></p>
		</form>
	</div>
</body>
</html>