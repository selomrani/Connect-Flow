<?php

$db_server = "mysql"; 
$db_user = "root";
$db_pass = "SoufyanBackendProject$"; 
$db_name = "ConnectFlow_db";

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if(!$connection){
    die("Connection failed: " . mysqli_connect_error());
}

?>