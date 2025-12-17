<?php
session_start();

require_once __DIR__ . '/../../../../src/config/connectdb.php';

require_once __DIR__ . '/../../../../src/functions.php';

$user_data = check_login($db_connect);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../home.php"); 
    exit();
}
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: home.php");
    exit();
}
$contact_fullname = $_POST['fname'];
$contact_email    = $_POST['contactEmail'];
$contact_phone    = $_POST['phoneContact'];
$error_message    = "";


if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
    $error_message = "Please enter a valid email";
}

if (empty($error_message)) {
    $query = $db_connect->prepare("INSERT INTO `contacts` (`fullname`, `email`, `phone_number`, `user_id`) 
            VALUES (:fullname, :email, :phone_number, :user_id)");

    $query->execute([
        'fullname'     => $contact_fullname,
        'email'        => $contact_email,
        'phone_number' => $contact_phone,
        'user_id'      => $user_data['user_id'],
    ]);
}
header("Location: ../home.php");
exit();
