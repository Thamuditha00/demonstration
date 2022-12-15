<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "interim";

$con = mysqli_connect($host, $username, $password, $db);

if (!isset($_SESSION['username']) && $_SESSION['userType'] != 'admin') {
    header("location:login.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../");
}

// mysqli_connect($host,$username,$password);
// mysqli_select_db($db);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['register-cho'])) {

    if (isset($_POST['District']) && isset($_POST['ContactNo']) && isset($_POST['Email']) && isset($_POST['Address'])) {

        $id = uniqid("cho", true);
        $district = $_POST['District'];
        $contactNo = $_POST['ContactNo'];
        $email = $_POST['Email'];
        $address = $_POST['Address'];

        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        try {
            $sql = "INSERT INTO register (District, ContactNo,Email,Address)
					VALUES ('$district','$contactNo','$email',' $address')";
            $result = mysqli_query($con, $sql);

        } catch (Exception $e) {
            echo "<script>alert('Something Went wrong')</script>";

        }

        try {
            $sql = "INSERT INTO users (ID,username, password)
          VALUES ('$id','$username','$password')";
            $result = mysqli_query($con, $sql);
            echo "<script>alert('CHO Added Successfully.')</script>";
            header("location: ./cho.php");

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>side navigation bar</title>
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css"/>
    <link rel="stylesheet" href="sidebar.css">
</head>
<body>

<div class="wrapper">
    <?php
    include_once 'sidebar.php';
    ?>
    <div class="main-area">
        <div class="form">
            <h1>Register CHO</h1>
            <div class="content">
                <form action="" method="POST" id="registerCHO">
                    <label class="district" for="District">District</label>
                    <select name="District" id="district" onchange="validateDistrict()" required>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                    <span id="districtError"></span>

                    <label for="Contact Number">Contact Number:</label>
                    <input class="inputs" type="text" placeholder="Enter number" name="ContactNo" id="contactNo"
                           onkeyup="validateContact()" required>
                    <span id="contactError"></span>


                    <label for="Email">Email:</label>
                    <input class="inputs" type="text" placeholder="Enter email" name="Email" id="email"
                           onkeyup="validateEmail()" required>
                    <span id="emailError"></span>

                    <label for="Address">Address:</label>
                    <input class="inputs" type="text" placeholder="Enter address" name="Address" id="address" required>

                    <label for="username">Username:</label>
                    <input class="inputs" type="text" placeholder="Enter username" name="username" id="username"
                           onchange="validateUsername()" required>
                    <span id="usernameError"></span>

                    <label for="password">Password:</label>
                    <div class="pw-list">
                        <ul class="pw-list">
                            <li>Password length should be between 8 and 15 characters</li>
                            <li>Password should contain at least one uppercase letter</li>
                            <li>Password should contain at least one lowercase letter</li>
                            <li>Password should contain at least one number</li>
                            <li>Password should contain at least one special character</li>
                        </ul>
                    </div>
                    <input class="inputs" type="password" placeholder="Enter password" name="password" id="password"
                           onkeyup="validatePassword()" required>
                    <span id="passwordError"></span>

                    <div class="submit-btn">
                        <button type="submit" class="registerbtn" name="register-cho">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./registercho.js"></script>
</body>
</html>

