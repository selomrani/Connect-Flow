<?php
$server = "mysql"; 
$user = "root";
$password = 'SoufyanBackendProject$'; 
$database = "ConnectFlow_db";

try {
    $db_connect = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    
    $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "failed " . $e->getMessage();
}
?>