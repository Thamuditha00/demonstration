<?php
session_start();

if(isset($_POST['register'])){
    include "./config/authController.php";
    $auth = new authController();
    $result = $auth->register($_POST);
    if($result === 1){
        $_SESSION['registrationMsg'] = "Registration Successful";
        header("Location: login.php");
    } else {
        echo $result;
    }
}

?>

<form action="" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="register" value="Register">
</form>