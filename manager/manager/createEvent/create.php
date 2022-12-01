<?php


$hash = password_hash("Manager@123", PASSWORD_BCRYPT);

echo password_verify("Manager@123", $hash);

//echo $hash;
//
//
//
//echo uniqid("event",true);


//global $conn;
//$serverName = "localhost";
//$dbname ="test";
//$userName = "root";
//$password = "";
//
//try {
//    $conn = new PDO("mysql:host=$serverName;dbname=$dbname", $userName, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  } catch(PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
//
//try {
//    $usrname = "manager1";
//
//    $stmt = $conn->prepare("SELECT * FROM manager WHERE username = :username");
//    $stmt->bindParam(':username', $usrname);
//    $stmt->execute();
//    $stmt->setFetchMode(PDO::FETCH_ASSOC);
//    $result = $stmt->fetchAll();
//
//    if(password_verify("Manager@123", $result[0]['password'])) {
//        echo "password verified";
//    } else {
//        echo "password not verified";
//    }
//
//} catch(PDOException $e) {
//    echo "Creation failed: " . $e->getMessage();
//}
