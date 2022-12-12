<?php 
include 'config.php';
error_reporting(0);

if (isset($_POST['register'])) {
	$id = uniqid('manager', true);
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$name = $_POST['name'];
	$age = $_POST['age'];
	$NIC = $_POST['NIC'];
	$gender = $_POST['gender'];

	try {
		$sql = "INSERT INTO manager (id, Name, age,NIC,gender) VALUES ('$id', '$name', '$age','$NIC','$gender')";
		if($conn->query($sql) === TRUE) {
			header("Location: index.php");
		}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}


	try {
		$sql = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$password')";
		if($conn->query($sql) === TRUE) {
			header("Location: index.php");
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
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Please add manager's details</p>
				<input type="text" placeholder="Name" name="name"required>
				<input type="text" placeholder="age" name="number"required>
				<input type="text" placeholder="NIC" name="NIC"required>

				<select name=gender>
					<option value=""> Select </option>
					<option value="male"> Male </option>
					<option value="female"> Female </option>
				</select>

				<input type="text" placeholder="Username" name="username"required>
				<input type="password" placeholder="Password" name="password" required>
				<button name="register" class="button">Register</button>
		</form>
	</div>
</body>
</html>