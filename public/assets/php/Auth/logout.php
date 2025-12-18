<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == $_POST) session_destroy();
    header("Location: ../login.php");
    exit();