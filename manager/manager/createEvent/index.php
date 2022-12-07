<?php
session_start();

if(!isset($_SESSION['username']) &&$_SESSION['userType'] != 'manager') {
    $_SESSION['loginError'] = "Please login first";
    $_SESSION['returnUrl'] = $_SERVER['REQUEST_URI'];
    header("Location: ../../login.php");
}

include_once ("../../config/databaseConf.php");

$eventModel = new eventModel("root","");
$names = $eventModel->getEventCategoryNames();
$returnMsg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if( isset($_POST['logout']) ) {
        include_once ("../../config/authController.php");
        $auth = new authController();
        $auth->logout();
        header("location: ../../../");
    }

    $returnMsg = $eventModel->createEvent($_POST);


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles.css">
    <link rel="stylesheet" href="./styles.css">
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
                <h1>Create a event</h1>
            </div>

        </div>

        <div>
            <?php
            if($returnMsg != '') {
                echo "<h2> $returnMsg </h2>";
            }
            ?>

        </div>

        <div class="mainDown">



            <form action="" method="post">

                <div class="formDiv">

                    <div>
                        <div class="formLabel">
                            <label for="eventCategory">Event Category : </label>
                        </div>
                        <div class="formField">
                            <select name="eventCategory" id="eventCategory" class="formSelect" >
                                <option value=''>               select              </option>
                                <?php
                                foreach($names as $key => $value){
                                    echo "<option value='$key'>$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="formLabel">
                            <label for="eventTheme">Event Name : </label>
                        </div>
                        <div class="formField">
                            <input type="text" name="eventTheme" id="eventTheme" size="40">
                        </div>

                    </div>

                    <div>
                        <div class="formLabel">
                            <label for="eventContact">Add a contact No : </label>
                        </div>
                        <div class="formField">
                            <input type="text" name="eventContact" id="eventContact" size="40">
                        </div>

                    </div>

                    <div>
                        <div class="formCol">
                            <div class="formLabel">
                                <label for="eventDate">On : </label>
                            </div>
                            <div class="formField">
                                <input type="date" name="eventDate" id="eventDate" size="40">
                            </div>
                        </div>

                        <div class="formCol">
                            <div class="formLabel">
                                <label for="eventTime">At : </label>
                            </div>
                            <div class="formField">
                                <input type="time" name="eventTime" id="eventTime" size="40">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="formLabel">
                            <label for="eventLocation">Location : </label>
                        </div>
                        <div class="formField">
                            <input type="text" name="eventLocation" id="eventLocation" size="40">
                        </div>

                    </div>

                    <div class="formText">
                        <div class="formLabel">
                            <label for="eventDescription">Description : </label>
                        </div>
                        <div class="formField">
                            <textarea name="eventDescription" id="eventDescription" cols="40" rows="10" class="formTextarea"></textarea>
                        </div>
                    </div>

                    <div>
                        <button type="submit" name="createEvent">Confirm</button>
                    </div>
                </div>


            </form>


        </div>

    </div>

</div>

</body>

</html>