<?php
    session_start();
    $_SESSION['user'] = 'guest';
?>

<form action="./manager/login.php" method="get">
    <button>Manager login</button>
</form>