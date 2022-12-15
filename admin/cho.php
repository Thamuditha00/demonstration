<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['userType'] != 'admin') {
    header("Location: ./login.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>side navigation bar</title>
    <link rel="stylesheet" href="cho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.7/css/boxicons.min.css"/>
    <link rel="stylesheet" href="sidebar.css">

</head>
<body>

<div class="wrapper">
    <?php
    include_once 'sidebar.php';
    ?>

    <div class="main-area">
        <div class="main-upper">
            <h2>Community Head Office</h2>
            <form action="registercho.php" method="POST">
                <div class="btn">
                    <button class=" button button1">Register CHO</button>
                </div>
            </form>
        </div>

        <div class="content">

            <table>
                <tr>
                    <th>ID</th>
                    <th>DISTRICT</th>
                    <th>CONTACT NO</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th></th>

                </tr>


                <tbody>

                <?php
                $host = "localhost";
                $username = "root";
                $password = "";
                $db = "interim";

                $con = mysqli_connect($host, $username, $password, $db);
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit;
                }

                //read all row form database table
                $sql = "SELECT * FROM register";
                $result = $con->query($sql);

                if (!$result) {
                    die("Invalid query:" . $con->error);

                }

                //read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo
                        "<tr>
          <td>" . $row["ID"] . "</td>
          <td>" . $row["District"] . "</td>
          <td>" . $row["ContactNo"] . "</td>
          <td>" . $row["Email"] . "</td>
          <td>" . $row["Address"] . "</td>
          <td><form action='view.php' method='POST'>
              <button class='button button1'>view</button>
          </form>
          </td>
        </tr>";
                }

                ?>


                </tbody>

            </table>


        </div>


    </div>

</div>
</body>
</html>

