<?php

$db_server = "mysql"; 
$db_user = "root";

$db_pass = "SoufyanBackendProject$"; 

$db_name = "ConnectFlow_db";
$connection = "";


    $connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if($connection){
        echo "You are connected";
    }
    else{
       die("Connection failed: " . mysqli_connect_error());
    }