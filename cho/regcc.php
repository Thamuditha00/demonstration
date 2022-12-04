<?php
include 'config.php';

if($_SESSION['userType'] != 'cho' && !isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['submit'])){
  $address= $_POST['address'];
  $area= $_POST['area'];
  $contactnum= $_POST['contactNumber'];
  $email= $_POST['email'];
  $fax = $_POST['fax'];

  $sql="INSERT INTO cc(address,area,contactNumber,email,faxNumber) VALUES ('address','area','contactNumber','email','fax')";
  $result=mysqli_query($conn,$sql);

  if($result){
    echo "<script>alert('Community Center added succefully')</script>";
  }
  else{
    echo "<script>alert('Something went wrong')</script>";
  }
}
?>
  

html>
<head>
    <title> Register a Community Center</title>
    <link rel="stylesheet" href="regstyle.css">
    <link rel="icon" href="logo.png" class="logo">
</head>

<body>

    <center>
        <h2>Add a Community Center</h2>
    </center>
    <div class="sidenav">
    <img class="logo" src="logo.png">
        <a href="#"> Users </a>
        <a href="index.php"> Community Center </a>
        <a href="#">Complaints</a>
        <a href="logout.php"> Logout </a>
    </div>


    <form method="POST" action="" class="formStyle">

        <p>Address</p>
        <input type="text" placeholder="Address" name="address" />
        <p>Area</p>
        <input type="text" placeholder="Area" name="area" />
        <p> Contact Number</p>
        <input type="text" placeholder="Contact Number" name="contactNumber" />
        <p> Email Address</p>
        <input type="email" placeholder="Email Address" name="email" />
        <p> Fax</p>
        <input type="text" placeholder="Fax" name="fax" />
        <button name="submit" value="done"> Submit </button>
    </form>

</body>

</html>