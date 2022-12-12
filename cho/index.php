<?php //
//session_start();
//if (!isset($_SESSION['username']) && $_SESSION['userType'] != 'cho') {
//    header("Location: login.php");
//}
//?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Community Center Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div  class="reg-button">
<a href="regcc.php"">
    <button class="reg-cc">Register a Community Center</button>
</a>
</div>
<h3 style="text-align: center;margin-top: 50px;margin-left:-50px;font-size:30">Community Centers</h3>

<div class="sidenav">
    <img class="logo" src="logo.png">
    <a href="#">Users</a>
    <a href=".php">Community Center</a>
    <a href="#">Complaints</a>
    <a href="logout.php"> Logout </a>
</div>
</body>
</html>
