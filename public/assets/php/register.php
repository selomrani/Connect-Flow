<?php
session_start();
require_once __DIR__ . '/../../../src/config/connectdb.php';
require_once __DIR__ . '/../../../src/functions.php';
$error_message = "";
$sucess_message="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $phone    = $_POST["phone"];
    $password = $_POST["password"];
    $confirm  = $_POST["confirm_password"];

    if ($password !== $confirm) {
        $error_message = "The password values must match";
    } 

    if(empty($error_message)){

        $query = $db_connect->prepare("INSERT INTO `users` (`username`, `email`, `password`, `phone_number`)
                VALUES (:username, :email, :password, :phone_number)");
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query->execute([
            'username'     => $username,
            'email'        => $email,
            'password'     => $hashed_password,
            'phone_number' => $phone,
        ]);

        // header("location : login.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h1>Register</h1>
            <?php if ($sucess_message): ?>
                <p style="color: green; text-align: center;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <?php if ($error_message): ?>
                <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div class="input-field">
                <input type="text" name="username" placeholder="username" required><i class='bx bxs-user'></i>
            </div>
            <div class="input-field">
                <input type="email" name="email" required placeholder="email"><i class='bx bxs-envelope'></i>
            </div>
            <div class="input-field">
                <input type="password" name="password" required placeholder="password"><i class='bx bxs-lock'></i>
            </div>

            <div class="input-field">
                <input type="password" name="confirm_password" required placeholder="confirm password"><i class='bx bxs-lock'></i>
            </div>

            <div class="input-field">
                <input type="tel" name="phone" placeholder="Phone number (optional)"><i class='bx bxs-phone'></i>
            </div>

            <button class="btn" type="submit">Register</button>
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>