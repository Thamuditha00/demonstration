<?php
include 'config.php';

if ($_SESSION['userType'] != 'cho' && !isset($_SESSION['username'])) {
    header('Location: login.php');
}

if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    $area = $_POST['area'];
    $contactnum = $_POST['contactNumber'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];
    $cho = $_SESSION['username'];

    try {
        $sql = "INSERT INTO cc(address,area,contactNumber,email,faxNumber,cho) VALUES ('$address','$area','$contactnum','$email','$fax','$cho')";
        $result = mysqli_query($conn, $sql);
    } catch (Exception $e) {
        echo "<script>alert('Something went wrong')</script>";
    }

}
?>


html>
<head>
    <title> Register a Community Center</title>
    <link rel="stylesheet" href="regstyle.css">
    <link rel="icon" href="logo.png" class="logo">
</head>

<body>
<div class="container">

    <div class="sidenav">
        <img class="logo" src="logo.png">
        <a href="#"> Users </a>
        <a href="index.php" class="active"> Community Center </a>
        <a href="#">Complaints</a>
        <a href="logout.php"> Logout </a>
    </div>
    <div class="main-area">
        <h2>Add a Community Center</h2>
        <form method="POST" action="" class="formStyle">

            <p>Address</p>
            <input type="text" placeholder="Address" name="address" required/>
            <p>Area</p>
            <input type="text" placeholder="Area" name="area"/>
            <p> Contact Number</p>
            <input type="text" placeholder="Contact Number" name="contactNumber" required/>
            <p> Email Address</p>
            <input type="email" placeholder="Email Address" name="email" required/>
            <p> Fax</p>
            <input type="text" placeholder="Fax" name="fax" required/>
            <button name="submit" value="done"> Submit</button>
        </form>
    </div>
</div>

</body>

</html>