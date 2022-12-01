

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>side navigation bar</title>
  <link rel="stylesheet" href="cho.css">
</head>
<body>
  
  <div class="wrapper">
    <div class="sidebar">
      <img class="logo" src="logo.svg"> 
      <ul>
        <li><a href="#">Request</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="#">Donations</a></li>
        <li><a href="#">Complains</a></li>
        <li><a href="#">Donees</a></li>
        <li><a href="#">Donors</a></li>
        <li><a href="#">Drivers</a></li>
        <li><a href="#">Employees</a></li>
        <li><a href="#">Community Centers</a></li>
        <li><a href="#">Community Head Office</a></li>


      </ul>
      

    </div>
    
    <div class="main-area">
      <div class="main-upper">
        <h1>notification icon</h1>
        <form action="register.php" method="POST">
          <div class="btn">
        <button class=" button button1">Register CHO</button>

</div>
      </form>
        


      </div>
     
     

  
      <div class="cho">
        <h2>Community Head Office</h2>
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
      $host="localhost";
      $username="root";
      $password="";
      $db="admin";

      $con=mysqli_connect($host,$username,$password,$db);
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
      }

      //read all row form database table
      $sql="SELECT * FROM register";
      $result=$con->query($sql);

      if(!$result){
        die("Invalid query:".$con->error);

      }

      //read data of each row
      while($row=$result->fetch_assoc()){
        echo
        "<tr>
          <td>".$row["ID"]."</td>
          <td>".$row["District"]."</td>
          <td>".$row["ContactNo"]."</td>
          <td>".$row["Email"]."</td>
          <td>".$row["Address"]."</td>
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

