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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="auth_styles.css">
    <title>Register</title>
</head>

<body>

    <div class="container">
        <div>
            <h2> Register</h2>
        </div>

        <div class="loginDiv">
            <form action="#" method="post">

                <div>
                    <input type="text" name="username" placeholder="Username" size="40">
                </div>

                <div>
                    <input type="password" name="password" placeholder="Password" size="40">
                </div>

                <div>
                    <button name="register" class="login-btn">Register</button>
                </div>

            </form>

        </div>

        <div>
            <p>Already have an account? <a href="login.php">Login?</a></p>
        </div>

    </div>


</body>

</html>