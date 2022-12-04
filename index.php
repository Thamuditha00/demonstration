<?php
    session_start();
    $_SESSION['userType'] = 'guest';
?>

<form action="./donee/login.php" method="get">
    <button>Donee login</button>
</form>

<form action="./manager/login.php" method="get">
    <button>Manager login</button>
</form>

<form action="./cho/login.php" method="get">
    <button>CHO login</button>
</form>

<form action="./admin/login.php" method="get">
    <button>Admin login</button>
</form>



