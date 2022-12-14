<?php
session_start();


include_once("./config/authController.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_SESSION['username'])) {
        header("Location: ./manager");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new authController();
    $errMsg = $auth->checkCredentials($username, $password);
    if ($errMsg === '') {
        $_SESSION['username'] = $username;
        $_SESSION['userType'] = 'manager';
        if (isset($_SESSION['returnUrl'])) {
            header("Location: ${_SESSION['returnUrl']}");
        } else {
            header("Location: ./manager");
        }
    } else {
        $_SESSION['loginError'] = $errMsg;
        $_SESSION['errorRemove'] = false;
        header("Location: ./login.php");
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
</head>

<body>


<div class="container">
    <?php
    if (isset($_SESSION['registrationMsg'])) {
        echo "<div><h5>" . $_SESSION['registrationMsg'] . "!</h5></div>";
        echo "<div><h5>Please login to continue</h5></div>";
        unset($_SESSION['registrationMsg']);
    }
    ?>

    <div class="form">
        <i class="material-icons md-48">admin_panel_settings</i>
        <br>
        <h1>Hello! Manager</h1>
        <form action="#" method="post">

            <input type="text" placeholder="Username" name="username" id="username">
            <input type="password" placeholder="Password" name="password" id="password">
            <div class="login-btn">
                <button class="btn-login">Login</button>
            </div>
            <div class="loginError">
                <?php
                if (isset($_SESSION['errorRemove'])) {
                    echo $_SESSION['errorRemove'];
                    unset($_SESSION['errorRemove']);
                } else if (isset($_SESSION['loginError'])) {
                    echo $_SESSION['loginError'];
                    unset($_SESSION['loginError']);
                }
                ?>
            </div>
            <p>Doesn't have an account? Contact your cho</p>
        </form>
    </div>
</div>


</body>

</html>