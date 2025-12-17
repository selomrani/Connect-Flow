<?php
// $user_data = check_login($db_connect);
require_once __DIR__ . '/../../../src/config/connectdb.php';
require_once __DIR__ . '/../../../src/functions.php'; 
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = $db_connect->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $query->execute(['username' => $username]);
    $user_data = $query->fetch(PDO::FETCH_ASSOC);
    if ($user_data && password_verify($password, $user_data['password'])) {
        session_start();
        $_SESSION['user_id'] = $user_data['user_id'];
        header("Location: home.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
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