<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .user-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
            padding: 2rem;
        }
        .user-div {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .user-div p {
            margin: 0;
            margin-bottom: 0.5rem;
        }
        .user-div .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.5rem;
        }
        .user-div .btn-container form {
            display: flex;
            gap: 1rem;
        }
    </style>
</head>
<body>
    <?php
    include_once 'navbar.php';
    require_once '../model/dbcon.php';
    
    // Check if the user is logged in
    if (isset($_SESSION['lgdin']) && $_SESSION['lgdin']) {
        // Get the user's account type from the database
        $userId = $_SESSION['userid'];
        $sql = "SELECT account_type FROM users WHERE user_id = '$userId'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $accountType = $row['account_type'];
            $_SESSION['acc_type']=$accountType;
            
            if ($accountType === 'admin') {
            ?>
                <h1 class="text-center mt-5">User List</h1>
                <div class="user-list container">
                    <?php
                    // Database connection settings
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
                                <p><strong>User ID:</strong><br> <?php echo $row['user_id']; ?></p>
                                <p><strong>Username:</strong><br> <?php echo $row['username']; ?></p>
                                <p><strong>Email:</strong><br><?php echo $row['email']; ?><br><br></p>
                                
                                <!-- Form for updating user -->
                                <div class="btn-container">
                                    <form action="update.php" method="post">
                                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </form>
                                
                                    <!-- Form for deleting user -->
                                    <form action="../controller/delete_user.php" method="post">
                                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p class='text-center mt-4'>No users found.</p>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
            <?php 
            }
            else{
                ?>
                <h1 class="text-center mt-5">Unautherized Access!</h1>
                <?php
            }
        }
    }
    ?>
</body>
</html>
