<?php 
include 'config.php';
if (!isset($_SESSION['username']) && $_SESSION['userType'] != 'cho') {
    header("Location: login.php");
}



  try {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM cc WHERE cho = '$username'";
    $result = mysqli_query($conn, $sql);
    $arr = $result->fetch_all(MYSQLI_ASSOC);
  } catch (Exception $e) {
    echo "<script>alert('Something went wrong')</script>";
  }


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Community Center Dashboard</title>
    <link rel="stylesheet" href="style.css">
    </head>

<body>
   <h2><a href="regcc.php" style="text-decoration:none;position:fixed;border-radius: -35px; left:1200px; top:50px;font-size:15px ;display: inline-block;background-color: #4CAF50;border: none;color: white; ">Register a Community Center</a></h2>
   <h3 style="text-align: center;margin-top: 50px;margin-left:-50px;font-size:30">Community Centers</h3>
        
   <div class="sidenav">
        <img class="logo" src="logo.png">
        <a href="#">Users</a>
        <a href=".php">Community Center</a>
        <a href="#">Complaints</a>
        <a href="logout.php"> Logout </a>
    </div>

    <?php
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    ?>
</body>
</html>
