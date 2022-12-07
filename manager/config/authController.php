<?php

class authController
{
private $conn;
private $serverName = "localhost";
private $dbname ="interim";
private $userName = "root";
private $password = "";

public function __construct()
{
    try {
        $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbname", $this->userName, $this->password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}


public function checkCredentials($usrname, $pass) {
    try {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $usrname);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        if(!str_contains($result[0]['ID'], 'manager')) {
            return "username does not exists";
        }

        if(empty($result)) {
            return "username do not exists";
        }
        if(password_verify($pass, $result[0]['password'])) {
            return "";
        } else {
            return "Either password or username is wrong";
        }
    } catch(PDOException $e) {
        return "Login failed: " . $e->getMessage();
    }
}

public function logOut() {
    session_start();
    session_unset();
    session_destroy();

}

public function register($POST) {
    try {
        $id = uniqid('manager', true);
        $pass = password_hash($POST['password'], PASSWORD_DEFAULT);
        $username = $POST['username'];
        $stmt = $this->conn->prepare("INSERT INTO users (ID, username, password) VALUES (:id,:username, :password)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        return 1;
    } catch(PDOException $e) {
        return "Registration failed: " . $e->getMessage();
    }
}

}