<?php
include 'config.php';

if ($_SESSION['userType'] != 'cho' && !isset($_SESSION['username'])) {
    header('Location: login.php');
}

if (isset($_POST['submit'])) {
    $id = uniqid('cc', true);
    $address = $_POST['address'];
    $area = $_POST['area'];
    $contactnum = $_POST['contactNumber'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];
    $cho = $_SESSION['username'];

    try {
        $sql = "INSERT INTO cc(commId,address,area,contactNumber,email,faxNumber,cho) VALUES ('$id','$address','$area','$contactnum','$email','$fax','$cho')";
        $result = mysqli_query($conn, $sql);
        header('Location: managerRegister.php');
    } catch (Exception $e) {
        echo "<script>alert('Something went wrong')</script>";
    }


}
?>


<html>
<head>
    <title> Register a Community Center</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" class="logo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css"/>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="form.css">
</head>

<body>
<div class="container">
    <?php include 'sidebar.php'; ?>

    <div class="main">
        <div class="form">
            <h2>Register a Community Center</h2>
            <form method="POST" action="" class="formStyle" id="registerCC" onsubmit="return isValidated()">

                <label for="area">Area</label>
                <input type="text" placeholder="Area" name="area" onchange="validateAreas()"/>
                <span id="areaError"></span>
                <label for="address">Address</label>
                <input type="text" placeholder="Address" name="address" required/>
                <label for="contactNumber">Contact Number</label>
                <input type="text" placeholder="Contact Number" name="contactNumber" onkeyup="validateContact()"
                       required/>
                <span id="contactError"></span>
                <label for="email">Email</label>
                <input type="email" placeholder="Email Address" name="email" onkeyup="validateEmail()" required/>
                <span id="emailError"></span>
                <label for="fax">Fax Number</label>
                <input type="text" placeholder="Fax" name="fax" onkeyup="validateFax()" required/>
                <span id="faxError"></span>

                <div class="submit-button">

                <button name="submit" value="done" class="btn">Continue</button>
                    <p>Add Manager Details Next</p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./regcc.js"></script>

</body>

</html>
