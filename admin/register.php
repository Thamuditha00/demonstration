<?php
$host="localhost";
$username="root";
$password="";
$db="interim";

$conn=mysqli_connect($host,$username,$password,$db);

// mysqli_connect($host,$username,$password);
// mysqli_select_db($db);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

if (isset($_POST['register'])) {
    $id = uniqid('admin', true);
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (ID,username, password) VALUES ('$id','$username', '$password')";

    try {
        if ($conn->query($sql) === TRUE) {
        $_SESSION['registerMsg'] = "Successfully Registered";
        header("Location: login.php");
    } else {
        echo "Registration Failed";
    }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
}
echo password_hash('gampahacho@123', PASSWORD_DEFAULT);

?>

<form action="" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Register</button>
</form>