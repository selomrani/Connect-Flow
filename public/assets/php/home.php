<?php
session_start();

require_once __DIR__ . '/../../../src/config/connectdb.php';
require_once __DIR__ . '/../../../src/functions.php';
$user_data = check_login($connection);
$query = "SELECT * FROM contacts WHERE user_id = $user_data[user_id]";
$result = mysqli_query($connection, $query);
$user_contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User space</title>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/home.css">
</head>

<body>
  <h1>HELLO , <?php echo $user_data['username']; ?></h1>
  <p>Your Contacts:</p>
  <?php foreach ($user_contacts as $contact) { ?>
    <p>Name: <?php echo htmlspecialchars($contact['fullname']); ?> | Email: <?php echo htmlspecialchars($contact['email']); ?></p>
  <?php } ?>
  </H1>
  <div class="wrapper d-flex">
    <div class="col-3 vh-100 border border-primary">
    </div>
    <div class="col-9 vh-100 border border-primary">

    </div>



  </div>











  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>