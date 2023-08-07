<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
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
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="<?php echo $username; ?>"><br>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="<?php echo $email; ?>"><br>
                <input type="submit" value="Update">
            </form>
            <?php
        } else {
            echo "User not found.";
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>
</html>
