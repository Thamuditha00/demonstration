<?php
session_start();

$server = "localhost";
$user = "root";
$pass = "";
$db = "interim";

$conn = mysqli_connect($server, $user, $pass, $db) or die("Error connecting to database");
?>

<?php

if ($_SESSION['userType'] != 'cho') {
    header('Location: login.php');
    exit();
}


$query = "SELECT * FROM cc WHERE cho = '" . $_SESSION['username'] . "'";
$result = mysqli_query($conn, $query) or die("Error querying database");

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Community Center Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="table.css">

</head>

<body>
<div class="container">

    <div class="sidenav">
        <img class="logo" src="logo.png">
        <a href="#">Users</a>
        <a href="index.php" class="active">Community Center</a>
        <a href="#">Complaints</a>
        <a href="logout.php"> Logout </a>
    </div>

    <div class="main">
        <div class="profile-box">
            <div class="profile">
                <div class="profile-text">
                    <p style="font-size: 18px;"><b>Colombo CHO</b></p>
                    <p style="font-size: 14px; color: gray">Community Head Office</p>
                </div>
                <img class="profile-pic" src="images/profile.png">
            </div>
        </div>
        <div class="header">
            <h1>Community Centers</h1>
            <a href="regcc.php">
                <button class="main-cta">
                    Register a Community Center
                </button>
            </a>
        </div>
        <div class="table">

            <table>
                <tr>
                    <th>ID</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Fax Number</th>
                    <th></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['commId'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['area'] . "</td>";
                    echo "<td>" . $row['contactNumber'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['faxNumber'] . "</td>";
                    echo "<td><button>View</button><button>Contact</button></td>";
                    echo "</tr>";
                }
                ?>

            </table>
            <!--fon

            <?php
            while ($row = mysqli_fetch_array($result)) {
                include 'card.php';
            }
            ?>

        </div>
    </div>

</div>
</body>
</html>
