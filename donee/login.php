<?php
session_start();
?>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "interim";

$conn = mysqli_connect($server, $user, $pass, $db) or die("Error connecting to database");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query) or die("Error querying database");
    $arr = $result->fetch_assoc();

    if (mysqli_num_rows($result) == 1) {
        if (password_verify($password, $arr['password']) && str_contains($arr['ID'], 'donee')) {
            $_SESSION['userType'] = 'donee';
            $_SESSION['username'] = $username;
            header('Location: index.php');
        } else {
            echo "Invalid password";
        }
        header('Location: index.php');
        exit();
    } else {
        echo "Incorrect username or password";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>

<div class="container">
    <div class="form">
        <h1>Login</h1>
        <form action="" method="post">
            <input type="text" name="username" id="username" placeholder="username">
            <input type="password" name="password" id="password" placeholder="password" ">
            <div class="login-btn">
                <input type="submit" value="Login" id="submit">
            </div>
            <div class="reg-link">

                <p> Not registered yet?<a href="register.php"> Register </a></p>

            </div>
    </div>
</div>
</body>

</html>


