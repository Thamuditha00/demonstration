<?php
$host="localhost";
$username="root";
$password="";
$db="admin";

$con=mysqli_connect($host,$username,$password,$db);

// mysqli_connect($host,$username,$password);
// mysqli_select_db($db);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if(isset($_POST['register-cho'])){

  if(isset($_POST['District']) && isset($_POST['ContactNo']) && isset($_POST['Email']) && isset($_POST['Address'])){


    $district= $_POST['District'];
    $contactNo= $_POST['ContactNo'];
    $email= $_POST['Email'];
    $address= $_POST['Address'];
    
    try {
      $sql = "INSERT INTO register (District, ContactNo,Email,Address)
					VALUES ('$district','$contactNo','$email',' $address')";
    $result = mysqli_query($con, $sql);

    echo "<script>alert('CHO Added Successfully.')</script>";
    header("location: ./cho.php");
    }
    catch(Exception $e){
      echo "<script>alert('Something Went wrong')</script>";

    }
    
    
    
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>side navigation bar</title>
  <link rel="stylesheet"  href="reg.css">
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

      
    </div>
      <div class="cho">
        <h2>Register CHO</h2>
      </div>
      
      
      <div class="content">
  
      <div class="form-group">
        <label class = "district" for="District"><b>District</b></label>
        <br/>
        <br/>
        <input class = "inputs"type="text" placeholder="Enter DIstrict" name="District" id="district" required>
        <br/>
        
      </div>
      <div class="form-group">
        <label for="Contact Number"><b>Contact Number:</b></label>
        <br/>
        <br/>
        <input class = "inputs" type="text" placeholder="Enter number" name="ContactNo" id="contactNo" required>
        <br/>
        
        

      </div>
      <div class="form-group">
        <label for="Email"><b>Email:</b></label>
        <br/>
        <br/>
        <input class = "inputs" type="text" placeholder="Enter email" name="Email" id="email" required>
        <br/>
        

      </div>
      <div class="form-group">
        <label for="Address"><b>Address:</b></label>
        <br/>
        <br/>
        <input class = "inputs" type="text" placeholder="Enter address" name="Address" id="address" required>
        <br/>
        <br/>
        
      </div>
      <button type="submit" class="registerbtn" name="register-cho">Register</button>   
    </form>

  </div>
      
      

    </div>

  </div>
</body>
</html>
