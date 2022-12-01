<?php

session_start();

if(!isset($_SESSION['username'])) {
    $_SESSION['loginError'] = "Please login first";
    $_SESSION['returnUrl'] = $_SERVER['REQUEST_URI'];
    header("Location: ../login.php");
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once ("../config/authController.php");
    $auth = new authController();
    $auth->logout();
    header("location: ../login.php");
}

include_once ("../config/databaseConf.php");


$eventModel = new eventModel("root","");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Events</title>
</head>

<body>

    <div class="container">

        <div class="navbar">
            <div class="logoDiv">
                <img src="../src/managerCMS.svg" alt="CMS">
            </div>

            <div class="dashboardLinks">
                <ul>
                    <li><a href="#">Requests</a></li>
                    <li><a events href="#">Events</a></li>
                    <li><a href="#">Donations</a></li>
                    <li><a href="#">Donees</a></li>
                    <li><a href="#">Donors</a></li>
                    <li><a href="#">Drivers</a></li>
                </ul>
            </div>

            <div class="accountLinks">
                <ul>
                    <li><a href="#">Account</a></li>
                    <form action="" method="post">
                        <input type="submit" name="logout" value="Log Out">
                    </form>
                </ul>
            </div>

        </div>

        <div class="main">
            <div class="mainUpper">
                <h1>notification icon</h1>
            </div>

            <div class="dashHeading">
                <div class="dashName">
                    <h1>Events</h1>
                </div>

                <div class="create">
                    <form action="./createEvent" method="GET">
                        <button type="submit" name="createEvent">Create Event</button>
                    </form>
                </div>
            </div>

            <div class="functions">
                <div class="filters">
                    <button>Filter</button>
                </div>
            </div>

            <div class="mainDown">

                <?php
                 $eventModel->displayEvents();
                ?>

            </div>

        </div>

    </div>

</body>

</html>