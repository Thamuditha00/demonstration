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
  exit;
}

if(isset($_POST['username'])){

  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="select * from login  where username='".$username."' AND password='".$password."'limit 1";

  $result=mysqli_query($con,$sql);



  if(mysqli_num_rows($result)==1){
    echo " succefully logged";
    exit();
  }
  else{
    echo "incorrect password";
  }


}



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form in Design</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>


  
   <div class="container">
    <div class="title">
    <h1>Admin Login Form</h1>
    </div>
    <form method="POST" action="cho.php">
      <div class="form-input">
        <label for="username"><b>Username:</b></label>
        <input type="text" name="username" placeholder=" Enter username"/>
      </div>
      <br><br>
      <div class="form-input">
        <label for="password"><b>Password:</b></label>
        <input type="password" name="password" placeholder=" Enter password"/>
      </div> 
      
       
      <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
     
    </form>
   </div>
  
</body>
</html>