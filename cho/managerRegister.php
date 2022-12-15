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
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    try {
        $sql = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="logo.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css"/>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="form.css">
    <title>Sign up</title>
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="main">
        <div class="form">
            <h1>Add Manager details</h1>
            <form action="" method="POST" onsubmit="isValidate()" id="manager-reg">
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="age" name="number" required>
                <input type="text" placeholder="NIC" name="NIC" onkeyup="validateNIC()" required>
                <span id="NICError"></span>

                <select name=gender>
                    <option value=""> Select</option>
                    <option value="male"> Male</option>
                    <option value="female"> Female</option>
                </select>

                <input type="text" placeholder="Username" name="username" onkeyup="validateUsername()" required>
                <span id="usernameError"></span>

                <input type="password" placeholder="Password" name="password" onkeyup="validatePassword()" required>
                <span id="passwordError"></span>
                <div class="pw-list">
                    <ul class="pw-list">
                        <li>Password length should be between 8 and 15 characters</li>
                        <li>Password should contain at least one uppercase letter</li>
                        <li>Password should contain at least one lowercase letter</li>
                        <li>Password should contain at least one number</li>
                        <li>Password should contain at least one special character</li>
                    </ul>
                </div>
                <div class="submit-button">
                <button name="register" class="button">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script src="./managerRegister.js"></script>
</html>