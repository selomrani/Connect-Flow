<?php
session_start();
require_once __DIR__ . '/../../../src/config/connectdb.php';
require_once __DIR__ . '/../../../src/functions.php';
$user_data = check_login($db_connect);
$error_message = "";
$query = "SELECT * FROM contacts WHERE user_id = $user_data[user_id]";
$stmt = $db_connect->prepare($query);
$stmt->execute();
$user_contacts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User space</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <div class="d-flex min-vh-100">
        <aside class="sidebar d-flex flex-column flex-shrink-0 p-4">
            <a href="/" class="d-flex align-items-center mb-5 link-dark text-decoration-none">
                <i class="bi bi-circle-half text-theme fs-3 me-2"></i>
                <span class="fs-4 fw-bold text-theme">Connect Flow</span>
            </a>
            <div class="profile-section mb-4">
                <div class="d-inline-block">
                    <img src="../img/user-solid-full.svg" alt="User" class="profile-avatar">
                </div>
                <h5 class="fw-bold mb-1"><?php echo "$user_data[username]" ?></h5>
                <p class="text-secondary small mb-3"><?php echo "$user_data[email]" ?></p>
                <div class="d-inline-block bg-light text-secondary border rounded-pill px-3 py-2 mb-3 small fw-medium">
                    <i class="bi bi-calendar-check me-1"></i> <?php echo "$user_data[creation_date]" ?>
                </div>
                <div class="row g-2 mt-2">
                    <div class="col-12">
                        <div class="stat-box">
                            <div class="fw-bold fs-5 text-theme">128</div>
                            <div class="small text-muted" style="font-size: 0.7rem;">Contacts</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-secondary opacity-25 my-4">

            <div class="mt-auto">
                <ul class="nav flex-column mb-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-gear"></i>
                            Settings
                        </a>
                    </li>
                </ul>
                <form action="Auth/logout.php" method="post">
                    <button class="btn btn-outline-theme w-100 d-flex align-items-center justify-content-center gap-2 py-2" name="logout">
                        <i class="bi bi-box-arrow-right"></i> Log Out
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-grow-1 p-5">

            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <h2 class="fw-bold m-0">Welcome back, <?php echo "$user_data[username]" ?> </h2>
                    <p class="text-secondary m-0 mt-1">Here is your contact list overview.</p>
                </div>
                <button class="btn btn-theme d-flex align-items-center gap-2 px-4 py-2" data-bs-toggle="modal" data-bs-target="#AddNewContact">
                    <i class="bi bi-person-plus"></i> Add New Contact
                </button>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div class="d-flex gap-2">
                    <div class="dropdown">
                        <button class="btn btn-white border dropdown-toggle text-secondary bg-white px-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-sort-down me-2"></i> Sort by
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Name (A-Z)</a></li>
                            <li><a class="dropdown-item" href="#">Date Added</a></li>
                            <li><a class="dropdown-item" href="#">Most Active</a></li>
                        </ul>
                    </div>
                </div>
                <div class="input-group" style="width: 320px;">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-secondary"></i></span>
                    <input type="text" class="form-control border-start-0 ps-0 search-input shadow-none" placeholder="Search contacts...">
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <table class="table table-hover table-custom mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-end pe-5">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user_contacts as $contact): ?>
                                <tr class="contact-row">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="../img/user-solid-full.svg" class="avatar-small me-3" alt="">
                                            <span class="fw-semibold"><?php echo htmlspecialchars($contact['fullname']); ?></span>
                                        </div>
                                    </td>
                                    <td class="text-secondary"><?php echo htmlspecialchars($contact['phone_number']); ?></td>
                                    <td class="text-secondary"><?php echo htmlspecialchars($contact['email']); ?></td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-theme me-2 px-3"><i class="bi bi-pencil"></i> Edit</button>
                                        <button class="btn btn-sm btn-outline-danger px-3"><i class="bi bi-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="AddNewContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new contact</h1>
                    <?php if ($error_message): ?>
                        <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
                    <?php endif; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="Contacts_crud/create.php" method="post" novalidate>
                        <div class="form-group">
                            <labeL for="fname" class="form-label">Fullname</labeL>
                            <input type="text" name="fname" id="fname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="contact_email" class="form-label">Email</label>
                            <input type="email" name="contactEmail" id="contact-email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Phone number</label>
                            <input type="tel" name="phoneContact" id="phoneContact" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save new contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>