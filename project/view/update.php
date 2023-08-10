<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Update User</h1>
        <?php
        // Database connection settings
        require_once '../model/dbcon.php';
        session_start();
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['target_id'] = $_POST['user_id'];

            // Sanitize the input to prevent SQL injection
            $_SESSION['target_id'] = mysqli_real_escape_string($conn, $_SESSION['target_id']);

            // Fetch user details from the 'users' table
            $sql = "SELECT user_id, username, email FROM users WHERE user_id = '".$_SESSION['target_id']."'";
            $result = $conn->query($sql);

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $email = $row['email'];
                ?>
                <form action="../controller/update_user.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" placeholder="<?php echo $username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="<?php echo $email; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <?php
            } else {
                echo "User not found.";
            }

            // Close the database connection
            $conn->close();
        }else{
            $_SESSION['target_id'] = $_SESSION['userid'];

            // Sanitize the input to prevent SQL injection
            $_SESSION['target_id'] = mysqli_real_escape_string($conn, $_SESSION['target_id']);

            // Fetch user details from the 'users' table
            $sql = "SELECT user_id, username, email FROM users WHERE user_id = '".$_SESSION['target_id']."'";
            $result = $conn->query($sql);

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $email = $row['email'];
                ?>
                <form action="../controller/update_user.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" placeholder="<?php echo $username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="<?php echo $email; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            <?php
            }
        }
        ?>
    </div>

    <!-- Add Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>