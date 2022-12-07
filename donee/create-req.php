<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$db = "interim";

$conn = mysqli_connect($server, $user, $pass, $db) or die("Error connecting to database");
?>
<?php

if($_SESSION['userType'] != 'donee' && !isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
// import only subcategory column from subcategory database for php

$query = "SELECT * FROM subcategory";
$result = mysqli_query($conn, $query) or die("Error querying database");

?>


<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
?>

<div class="main">

<h1>Create a Request</h1>
    <?php
    include 'layouts/form.php';
    ?>

</div>

<?php

if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $item = $_POST['subcategory'];
    $amount = $_POST['amount'];
    $unit = $_POST['unit'];
    $urgency = $_POST['urgency'];
    $notes = $_POST['notes'];
}

    $query = "INSERT INTO requests (donee,item, amount, urgency, notes) VALUES ('$username','$item', '$amount', '$urgency', '$notes')";
    echo "Query correct". $query;
    try {
        if($conn->query($query) === TRUE) {
            header('Location: index.php');
        } else {
            echo "An error occured";
        }

    } catch(Exception $e) {
        echo  $e->getMessage();
    }
?>
