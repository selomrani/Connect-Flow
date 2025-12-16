<?php

function check_login($connection)
{
    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM users WHERE user_id = :id LIMIT 1";
        $stmt = $connection->prepare($query);

        $stmt->execute([':id' => $user_id]);

   
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);


        if($user_data) {
            return $user_data;
        }
    }

    // Redirect to login
    header("Location: home.php");
    die;
}