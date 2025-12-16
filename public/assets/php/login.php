<?php
session_start();
// $user_data = check_login($db_connect);
require_once __DIR__ . '/../../../src/config/connectdb.php';
require_once __DIR__ . '/../../../src/functions.php'; 

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    $query = "SELECT * FROM users WHERE username = '$username' limit 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        
        if ($user_data['password'] === $password) {
            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location: home.php");
            die;
        }
    }
    
    $error_message = "Wrong username or password!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <form action="login.php" method="post">
            <h1>LOGIN</h1>
            
            <?php if($error_message): ?>
                <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <div class="input-field">
                <input type="text" name="username" id="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" required placeholder="password">
                <i class='bx bxs-lock'></i>
            </div>
            <button class="btn" type="submit">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>