<?php
session_start();
require_once __DIR__ . '/../../../../src/config/connectdb.php';
require_once __DIR__ . '/../../../../src/functions.php';

$user_data = check_login($db_connect);
$contact_id = $_GET['update'] ?? $_POST['contact_id'] ?? null;
$query = "SELECT * FROM contacts WHERE id = :id LIMIT 1";
$stmt = $db_connect->prepare($query);
$stmt->execute([':id' => $contact_id]);
$contact = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $NewName  = $_POST['fname'];
        $NewEmail = $_POST['contactEmail'];
        $NewPhone = $_POST['phoneContact'];
        $query = "UPDATE contacts SET fullname = :name, email = :email, phone_number = :phone WHERE id = :id";

        $stmt = $db_connect->prepare($query);
        $stmt->execute([
            ':name'  => $NewName,
            ':email' => $NewEmail,
            ':phone' => $NewPhone,
            ':id'    => $contact_id
        ]);

        header("Location: ../home.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact - Connect Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/home.css">
    <style>
        .update-container {
            max-width: 600px;
            margin: 50px auto;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container update-container">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <div class="d-flex align-items-center gap-3">
                    <a href="../home.php" class="btn btn-outline-secondary btn-sm rounded-circle">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold m-0">Update Contact</h3>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="update.php" method="post">
                    <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">

                    <div class="mb-3">
                        <label for="fname" class="form-label fw-medium">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-person text-secondary"></i></span>
                            <input type="text" name="fname" id="fname" class="form-control"
                                value="<?php echo htmlspecialchars($contact['fullname']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contactEmail" class="form-label fw-medium">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-envelope text-secondary"></i></span>
                            <input type="email" name="contactEmail" id="contactEmail" class="form-control"
                                value="<?php echo htmlspecialchars($contact['email']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="phoneContact" class="form-label fw-medium">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-telephone text-secondary"></i></span>
                            <input type="tel" name="phoneContact" id="phoneContact" class="form-control"
                                value="<?php echo htmlspecialchars($contact['phone_number']); ?>" required>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="submit_update" class="btn btn-success py-2 fw-bold">
                            Save Changes
                        </button>
                        <a href="../home.php" class="btn btn-light py-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>