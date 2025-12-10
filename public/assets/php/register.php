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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once __DIR__ . '/../../../src/config/connectdb.php';

    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $email    = mysqli_real_escape_string($connection, $_POST["email"]);
    $phone    = mysqli_real_escape_string($connection, $_POST["phone"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $confirm  = mysqli_real_escape_string($connection, $_POST["confirm_password"]);
    
    // $username = $_POST["username"];
    // $email = $_POST["email"];
    // $password = $_POST["password"];
    // $confirm = $_POST["confirm_password"];
    // $phone = $_POST["phone"];

    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {

        $sql = "INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone_number`) 
                VALUES (NULL, '$username', '$email', '$password', '$phone');";
                mysqli_query($connection, $sql);
    }

    mysqli_close($connection);
}
?>