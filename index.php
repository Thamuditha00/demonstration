<?php
session_start();
$_SESSION['userType'] = 'guest';
?>

<link rel="stylesheet" href="style.css" type="text/css"/>
<!--import material icons-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<div class="wrapper">
    <div class="container">
        <form action="./donee/login.php" method="get">

            <button>
                <i class="material-icons">person</i>
                <br>
                Donee login
            </button>
        </form>

        <form action="./manager/login.php" method="get">
            <button>
                <i class="material-icons">manage_accounts</i>
                <br>Manager login</button>
        </form>

        <form action="./cho/login.php" method="get">
            <button>
                <i class="material-icons">location_city</i>
                <br>CHO login</button>
        </form>

        <form action="./admin/login.php" method="get">
            <button>
                <i class="material-icons">admin_panel_settings</i>
                <br>Admin login</button>
        </form>

    </div>
</div>


