<?php
$host="localhost";
$username="root";
$password="";
$db="interim";

$conn= new PDO("mysql:host=$host;dbname=$db", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmntCHO = $conn->prepare("SELECT District FROM register");

$stmntCHO->execute();

$stmntUsers = $conn->prepare("SELECT username FROM users");

$stmntUsers->execute();

$resultCHO = $stmntCHO->fetchAll(PDO::FETCH_COLUMN);
$resultUsers = $stmntUsers->fetchAll(PDO::FETCH_COLUMN);

$data['CHO'] = $resultCHO;
$data['usernames'] = $resultUsers;

echo json_encode($data);



?>