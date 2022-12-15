<?php

session_start();

if (!isset($_SESSION['username']) && $_SESSION['userType'] != 'manager') {
    $_SESSION['loginError'] = "Please login first";
    $_SESSION['returnUrl'] = $_SERVER['REQUEST_URI'];
    header("Location: ../login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once("../config/authController.php");
    $auth = new authController();
    $auth->logout();
    header("location: ../../");
}

include_once("../config/databaseConf.php");


$eventModel = new eventModel("root", "");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="../sidebar.css">
    <!-- import box icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css" />
    <title>Events</title>
</head>


<body>

    <div class="popup" id="popup">
        <div>

            <div class="row">
                <img src="../src/managerCMS.svg" alt="CMS" id="categoryIcon">
            </div>

            <div class="row">
                <h2>
                    <div id="theme" class="popuptext"></div>
                </h2>
            </div>

            <div class="row">
                <div>
                    <p>Event ID:</p>
                </div>
                <div id="eventID" class="popuptext"></div>
            </div>

            <div class="row">
                <div>
                    <p>Event category:</p>
                </div>
                <div id="category" class="popuptext"></div>
            </div>

            <div class="row">
                <div>
                    <p>Date:</p>
                </div>
                <div id="date" class="popuptext"></div>
            </div>

            <div class="row">
                <div>
                    <p>Time:</p>
                </div>
                <div id="time" class="popuptext"></div>
            </div>

            <div class="row">
                <div>
                    <p>Loaction:</p>
                </div>
                <div id="location" class="popuptext"></div>
            </div>

            <div>
                <div>
                    <p>Description:</p>
                </div>
            </div>
            <div class="descriptiondiv">
                <div id="description" class="popuptext"></div>
            </div>

            <div class="popupCloseButton create"> <button id="closebutton">Close</button> </div>
        </div>

    </div>

    <div class="container">
        <?php include_once '../sidebar.php'?>

        <div class="main">
        <div class="profile-box">
            <div class="profile">
                <div class="profile-text">
                    <p style="font-size: 18px;"><b><?php echo $_SESSION['username']?></b></p>
                    <p style="font-size: 14px; color: gray">Community Head Office</p>
                </div>
                <img class="profile-pic" src="profile.jpeg">
            </div>
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

            <div class="mainDown">
                <?php
                $eventModel->displayEvents($_SESSION['username']);
                ?>

            </div>

        </div>

    </div>

    <script src="./index.js"></script>

</body>

</html>