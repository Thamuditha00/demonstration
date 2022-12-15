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
    header("Location: ../");


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css"/>
    <link rel="stylesheet" href="form.css">

    <title>Create Event</title>
</head>

<body>

<div class="container">

    <?php include_once "../../sidebar.php" ?>
    <div class="main">
        <div class="form">
            <h1>Create an Event</h1>
            <form action="" method="post" name="eventForm" id="createForm" onsubmit="return isValidated()">
                <label for="eventCategory">Event Category : </label>
                <select name="eventCategory" id="eventCategory" class="formSelect" required>
                    <option value=''> select</option>
                    <?php
                    foreach ($names as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                    ?>
                </select>

                <label for="eventTheme">Event Name : </label>
                <input type="text" name="eventTheme" id="eventTheme" size="40" required>
                <label for="eventContact">Add a contact No : </label>
                <input type="text" name="eventContact" id="eventContact" size="40" onkeyup="validateContact()" required>
                <span id="contactError"></span>
                <label for="eventDate">Date: </label>
                <input type="date" name="eventDate" id="eventDate" size="40" onchange="validateDate()" required>

        <span id="dateError"></span>
        <label for="eventTime">Time: </label>
            <input type="time" name="eventTime" id="eventTime" size="40" required>
        <label for="eventLocation">Venue : </label>
        <input type="text" name="eventLocation" id="eventLocation" size="40" required>
        <label for="eventDescription">Description : </label>
        <textarea name="eventDescription" id="eventDescription" cols="40" rows="10"
                  class="formTextarea" required></textarea>
        <div class="submit-button">
            <button type="submit" name="createEvent" id="createEventButton">Confirm</button>
        </div>

        </form>
    </div>


</div>

</div>

<script src="./index.js"></script>

</body>

</html>