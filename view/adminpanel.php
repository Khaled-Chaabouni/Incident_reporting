<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>User List</h1>
    <div class="user-list">
        <?php
        // Database connection settings
        require_once '../model/dbcon.php';
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch users from the 'users' table
        $sql = "SELECT user_id, username, email FROM users";
        $result = $conn->query($sql);

        // Check if there are any users
        if ($result->num_rows > 0) {
            // Loop through each user and display their information in a div
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="user-div">
                    <p>User ID: <?php echo $row['user_id']; ?></p>
                    <p>Username: <?php echo $row['username']; ?></p>
                    <p>Email: <?php echo $row['email']; ?></p>

                    <!-- Form for updating user -->
                    <form action="update.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                        <input type="submit" value="Update">
                    </form>

                    <!-- Form for deleting user -->
                    <form action="../controller/delete_user.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </div>
                <?php
            }
        } else {
            echo "No users found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
