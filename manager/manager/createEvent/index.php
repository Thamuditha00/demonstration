<?php
session_start();

if (!isset($_SESSION['username']) && $_SESSION['userType'] != 'manager') {
    $_SESSION['loginError'] = "Please login first";
    $_SESSION['returnUrl'] = $_SERVER['REQUEST_URI'];
    header("Location: ../../login.php");
}

include_once("../../config/databaseConf.php");

$eventModel = new eventModel("root", "");
$names = $eventModel->getEventCategoryNames();
$returnMsg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['logout'])) {
        include_once("../../config/authController.php");
        $auth = new authController();
        $auth->logout();
        header("location: ../../../");
    }

    $returnMsg = $eventModel->createEvent($_POST, $_SESSION['username']);


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles.css">
    <link rel="stylesheet" href="create_event_styles.css">
    <title>Create Event</title>
</head>

<body>

<div class="container">

    <div class="navbar">
        <div class="logoDiv">
            <img src="../../src/managerCMS.svg" alt="CMS">
        </div>

        <div class="dashboardLinks">
            <ul>
                <li><a href="#">Requests</a></li>
                <li><a events href="../">Events</a></li>
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
                <h1>Create a event</h1>
            </div>

        </div>

        <div>
            <?php
            if ($returnMsg != '') {
                echo "<h2> $returnMsg </h2>";
            }
            ?>

        </div>

        <div class="mainDown">
            <div class="formDiv">
                <form action="" method="post" name="eventForm" id="createForm" onsubmit="return isValidated()">
                    <div class="form-block">
                    <label for="eventCategory">Event Category : </label>
                    <select name="eventCategory" id="eventCategory" class="formSelect" required>
                        <option value=''> select</option>
                        <?php
                        foreach ($names as $key => $value) {
                            echo "<option value='$key'>$value</option>";
                        }
                        ?>
                    </select>
                </div>

                    <label for="eventTheme">Event Name : </label>
                    <input type="text" name="eventTheme" id="eventTheme" size="40" required>
                    <label for="eventContact">Add a contact No : </label>
                    <input type="text" name="eventContact" id="eventContact" size="40" onkeyup="validateContact()" required>
                    <span id="contactError"></span>
                    <div class="form-block">
                    <label for="eventDate">On : </label>
                    <input type="date" name="eventDate" id="eventDate" size="40" onchange="validateDate()" required></div>
                    <span id="dateError"></span>
                    <div class="form-block"><label for="eventTime">At : </label>
                        <input type="time" name="eventTime" id="eventTime" size="40" required></div>
                    <label for="eventLocation">Venue : </label>
                    <input type="text" name="eventLocation" id="eventLocation" size="40" required>
                    <label for="eventDescription">Description : </label>
                    <textarea name="eventDescription" id="eventDescription" cols="40" rows="10"
                              class="formTextarea" required></textarea>
                    <div class="form-block">
                    <button type="submit" name="createEvent" id="createEventButton">Confirm</button>
                    </div>

                </form>
            </div>


        </div>

    </div>

</div>

<script src="./index.js"></script>

</body>

</html>