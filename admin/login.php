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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>


<div class="container">
    <div class="form">
        <i class="material-icons md-48">admin_panel_settings</i>
        <br>
        <h1>Hello! Admin</h1>
        <form action="" method="post">
            <input type="text" name="username" id="username" placeholder="Username"/>
            <input type="password" name="password" id="password" placeholder="Password"/>

            <div class="login-btn">
                <button type="submit" name="login" class="btn-login">Login</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>