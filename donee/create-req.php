<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "interim";

$conn = mysqli_connect($server, $user, $pass, $db) or die("Error connecting to database");
?>
<?php

if($_SESSION['userType'] != 'donee') {
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
    $subcategory = $_POST['subcategory'];
    echo $subcategory;

    $amount = $_POST['amount'];
    echo $amount;

    $unit = $_POST['unit'];
    echo $unit;

    $urgency = $_POST['urgency'];
    echo $urgency;

    $notes = $_POST['notes'];
    echo $notes;
}

    $query = "INSERT INTO requests (subcategory, amount, unit, urgency, notes) VALUES ('$subcategory', '$amount', '$unit', '$urgency', '$notes')";
    echo "Query correct". $query;
    $result2 = mysqli_query($conn, $query) or die("Error querying database");

    if ($result2) {
        echo "Request created successfully";
    } else {
        echo "Error creating request";
    }

