<?php
session_start();
 require_once __DIR__ . '/../../../src/config/connectdb.php';
  require_once __DIR__ . '/../../../src/functions.php';
  $user_data = check_login($connection);
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <h1>Hello  <?php echo"$user_data[username]" ?> </h1>
  </body>
  </html>