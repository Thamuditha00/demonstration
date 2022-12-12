<?php
    session_start();
?>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "interim";

$conn = mysqli_connect($server, $user, $pass, $db) or die("Error connecting to database");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $id = uniqid('donee', true);
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $NIC = $_POST['NIC'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];

    try {
        $query = "INSERT INTO donee (ID, fname, lname, NIC, email, contactno) VALUES ('$id','$fname','$lname','$NIC','$email','$contactno')";
        if ($conn->query($query) === TRUE) {
            //successfull
        } 
    } catch(Exception $e) {
        echo $e->getMessage();
    }

    $query = "INSERT INTO users (ID,username,password) VALUES ('$id','$username','$password')";

    try {
        if ($conn->query($query) === TRUE) {
            header('Location: login.php');
        } else {
            echo "An error occured";
        }
    } catch(Exception $e) {
        echo  $e->getMessage();
    }
}

?>

<form method="post" action="">
    <input type="text" name="fname" placeholder="first name"> 
    <input type="text" name="lname" placeholder="last name">
    <input type="text" name="NIC" placeholder="NIC">  
    <input type="text" name="email" placeholder="email">
    <input type="text" name="contactno" placeholder="contact number">  


    <input type="text" name="username" placeholder="username"> 
    <input type="password" name="password" placeholder="password">
    <button type="submit">Register</button>
</form>