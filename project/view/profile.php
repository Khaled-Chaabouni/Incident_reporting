<?php
require_once '../model/dbcon.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/stylesheets/style.css?v=<?php echo time(); ?>">
    <style>
        /* Additional custom styles here */
        .center-content {
            display: flex;
            justify-content: center;
            height: 100vh;
        }
        .small-button {
            width: 150px;
        }
    </style>
</head>
<body>

<div class="container mt-5 center-content">
    <div class="Profile">
        <div class="Profile-Informations border p-4 rounded shadow">
            <?php
            session_start();
            ?>
            <h4><?php echo $_SESSION['userid']; ?></h4>
            <h2><?php echo $_SESSION['username']; ?><br></h2>
            <h4><?php echo $_SESSION['email']; ?></h4>
            <!-- Wrapping button in a separate div with text-center class -->
            <div class="text-center">
                <a href="update.php">
                    <button class="btn btn-primary mt-3 small-button">Update profile</button>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
