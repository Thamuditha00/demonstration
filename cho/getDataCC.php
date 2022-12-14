<?php
$host="localhost";
$username="root";
$password="";
$db="interim";

$conn= new PDO("mysql:host=$host;dbname=$db", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmnt = $conn->prepare("SELECT area FROM cc");

$stmnt->execute();


$result = $stmnt->fetchAll(PDO::FETCH_COLUMN);

$data['areas'] = $result;


echo json_encode($data);



?>