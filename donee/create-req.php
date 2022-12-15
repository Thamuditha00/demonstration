<?php
session_start();

$server = "localhost";
$user = "root";
$pass = "";
$db = "interim";

$conn = mysqli_connect($server, $user, $pass, $db) or die("Error connecting to database");
?>
<?php

if ($_SESSION['userType'] != 'donee' && !isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
// import only subcategory column from subcategory database for php

$query = "SELECT * FROM category";
$result = mysqli_query($conn, $query) or die("Error querying database");

$query2 = "SELECT * FROM subcategory";
$result2 = mysqli_query($conn, $query2) or die("Error querying database");
$subcategories = mysqli_fetch_all($result2, MYSQLI_ASSOC);


?>


<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
?>

<div class="main">
    <?php
    include 'layouts/form.php';
    ?>

</div>

<script src="./create_req.js"></script>

<?php

function getSubcategory() {

    if(!empty($_POST['subcategorydryfood'])) {
        return $_POST['subcategorydryfood'];
    } else if(!empty($_POST['subcategoryclothes'])) {
        return $_POST['subcategoryclothes'];
    } else if(!empty($_POST['subcategorystationaries'])) {
        return $_POST['subcategorystationaries'];
    }
}

if (isset($_POST['create-req'])) {
    $username = $_SESSION['username'];
    $item = getSubcategory() ;
    $amount = $_POST['amount'];
    $unit = $_POST['unit'];
    $urgency = $_POST['urgency'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO requests (donee,item, amount, urgency, notes) VALUES ('$username','$item', '$amount', '$urgency', '$notes')";
    echo "Query correct" . $query;
    try {
        if ($conn->query($query) === TRUE) {
            header('Location: index.php');
        } else {
            echo "An error occured";
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
?>
