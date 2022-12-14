<?php
$host="localhost";
$username="root";
$password="";
$db="interim";

$conn= new PDO("mysql:host=$host;dbname=$db", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmntNIC = $conn->prepare("SELECT NIC FROM donee");

$stmntNIC->execute();

$stmntUsers = $conn->prepare("SELECT username FROM users");

$stmntUsers->execute();

$resultNIC = $stmntNIC->fetchAll(PDO::FETCH_COLUMN);
$resultUsers = $stmntUsers->fetchAll(PDO::FETCH_COLUMN);

$data['NICs'] = $resultNIC;
$data['usernames'] = $resultUsers;

echo json_encode($data);



?>
