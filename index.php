<?php
session_start();
$_SESSION['userType'] = 'guest';
?>

<link rel="stylesheet" href="style.css" type="text/css"/>
<!--import material icons-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="background">

    <div class="wrapper">
        <h1>CommuSupport</h1>
        <h2>Demonstration</h2>
        <div class="container">
            <form action="./admin/login.php" method="get">
                <button>
                    <i class="material-icons md-48">admin_panel_settings</i>
                    <br>Admin login
                </button>
            </form>

            <form action="./cho/login.php" method="get">
                <button>
                    <i class="material-icons md-48">location_city</i>
                    <br>CHO login
                </button>
            </form>

            <form action="./manager/login.php" method="get">
                <button>
                    <i class="material-icons md-48">manage_accounts</i>
                    <br>Manager login
                </button>
            </form>

            <form action="./donee/login.php" method="get">
                <button>
                    <i class="material-icons md-48">person</i>
                    <br>
                    Donee login
                </button>
            </form>


        </div>
    </div>
</div>


