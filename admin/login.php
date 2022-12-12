<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "interim";

$con = mysqli_connect($host, $username, $password, $db);

// mysqli_connect($host,$username,$password);
// mysqli_select_db($db);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $sql = "select * from users  where username='$username'";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }


    $result = mysqli_query($con, $sql);
    $arr = $result->fetch_array();

    if (password_verify($password, $arr['password']) && str_contains($arr['username'], 'admin')) {
        $_SESSION['username'] = $username;
        $_SESSION['userType'] = 'admin';
        header("Location: cho.php");
    } else {
        echo "incorrect password";
    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>


<div class="container">
    <div class="title">
        <h1>Admin Login Form</h1>
    </div>
    <form method="POST" action="">
        <div class="form-input">
            <label for="username"><b>Username:</b></label>
            <input type="text" name="username" placeholder=" Enter username"/>
        </div>
        <div class="form-input">
            <label for="password"><b>Password:</b></label>
            <input type="password" name="password" placeholder=" Enter password"/>
        </div>


        <button type="submit" name="login" class="btn-login">Login</button>

        <p><a href="register.php">Register</a></p>

    </form>
</div>

</body>
</html>