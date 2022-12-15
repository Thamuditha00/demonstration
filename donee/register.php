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
    $id = uniqid('donee', true);
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $NIC = $_POST['NIC'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];

    try {
        $query = "INSERT INTO donee (ID, fname, lname, NIC, email, contactno) VALUES ('$id','$fname','$lname','$NIC','$email','$contactno')";
        if ($conn->query($query) === TRUE) {
            //successfull
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $query = "INSERT INTO users (ID,username,password) VALUES ('$id','$username','$password')";

    try {
        if ($conn->query($query) === TRUE) {
            header('Location: login.php');
        } else {
            echo "An error occured";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
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
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/regform.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Donee Login</title>
</head>
<body>


<div class="container">
    <div class="form">




        <form method="post" action="" id="registerDonee" onsubmit="return isValidated()">
            <h1>Register as a Donee</h1>
            <input type="text" name="fname" placeholder="first name" required>
            <input type="text" name="lname" placeholder="last name" required>
            <input type="text" name="NIC" placeholder="NIC" onkeyup="validateNIC()" required>
            <span id="NICError"></span>
            <input type="text" name="email" placeholder="email" onkeyup="validateEmail()" required>
            <span id="emailError"></span>
            <input type="text" name="contactno" placeholder="contact number" onkeyup="validateContact()" required>
            <span id="contactError"></span>


            <input type="text" name="username" placeholder="username" onkeyup="validateUsername()" required>
            <span id="usernameError"></span>
            <input type="password" name="password" placeholder="password" onkeyup="validatePassword()" required>
            <span id="passwordError"></span>
            <div class="submit-button">
            <button type="submit" id="submit">Register</button>
            </div>
        </form>
    </div>
</div>

<script src="./register.js"></script>
</body>
</html>