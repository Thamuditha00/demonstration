<?php
session_start();

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

//select all from requests table
$query = "SELECT * FROM requests WHERE donee = '" . $_SESSION['username'] . "'";
$result = mysqli_query($conn, $query) or die("Error querying database");

?>

<html lang="en">

<head>
  <meta charset="utf-8" />

  <title>Donee</title>
  <meta name="description" content="Figma htmlGenerator" />
  <meta name="author" content="htmlGenerator" />
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />

  <!-- Use Box Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css" />

</head>


<body>

  <?php
  include 'layouts/header.php';
  include 'layouts/sidebar.php';
  ?>
  
  <div class="main">
    <div class="profile">
      <div class="notification-box">
        <i class='bx bx-bell'></i>
      </div>
      <a href="#">
        <div class="profile-box">

          John Doe
          <img src="images/profile.png" alt="profile-pic" />

          <!-- div with an icon tag for notifications -->
        </div>
      </a>
    </div>

    <div class="otherpages"></div>
    <!-- button named create a request -->
    <div class="header-cta">
      <h1 class="heading">My Requests</h1>
<a href="create-req.php">
    <button class="maincta-btn">Create A Request</button></a>
    </div>

    <div class="search-block">
      <div class="search">
        <!-- add search icon from box icons -->
        <i class='bx bx-search'></i>
        <input type="text" class="search-input-text" placeholder="Search" />

      </div>
    </div>



    <div class="content-box">
      <?php
      // call the php file card.php for each loop result in database

      while ($row = mysqli_fetch_array($result)) {
        include 'components/card.php';
      }

      echo "<pre>";
      print_r($row);
      echo "</pre>";
      ?>

    </div>



  </div>
  </div>
</body>

</html>