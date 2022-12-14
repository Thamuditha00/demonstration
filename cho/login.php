<?php
include 'config.php';
error_reporting(0);

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
    <link href="login.css" type="text/css" rel="stylesheet">
    <link rel="icon" href="logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> Login </title>
</head>
<body>

<div class="container">
    <div class="form">
        <i class="material-icons md-48">location_city</i>
        <br>
        <h1>Hello! CHO</h1>
        <form action="" method="POST">
            <input type="text" placeholder="Username" name="username" id="username">
            <input type="password" placeholder="Password" name="password" id="password">
            <div class="login-btn">
                <button type="submit" name="login" class="btn-login">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? Contact admin for registration</p>
        </form>
    </div>
</div>
</body>
</html>