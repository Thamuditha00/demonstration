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
        if(str_contains($arr['ID'], 'donee')) {
            if (password_verify($password, $arr['password']) ) {
                $_SESSION['userType'] = 'donee';
                $_SESSION['username'] = $username;
                header('Location: index.php');
            } else {
                echo "<script>alert('Incorrect Password! Please try again')</script>";
            }
        }
        else {
            echo "<script> alert('User does not exists!') </script>";
        }     
    } else {
        echo "<script> alert('User does not exists!') </script>";
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Donee Login</title>
</head>

<body>

<div class="container">
    <div class="form">
        <i class="material-icons md-48">person</i>
        <br>
        <h1>Hello! Donee</h1>
        <form action="" method="post">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password" ">

            <div class="login-btn">
                <input type="submit" value="Login" id="submit">
            </div>

            <p> Not registered yet?<a href="register.php"> Register </a></p>
        </form>
    </div>
</div>
</body>

</html>


