<?php
// Database connection settings
require_once '../model/dbcon.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['target_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Sanitize the inputs to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $userId);
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);

    // Build the SQL query to update the user's data based on the provided fields
    $sql = "UPDATE users SET ";
    $updateFields = array();

    if (!empty($username)) {
        $updateFields[] = "username = '$username'";
    }

    if (!empty($email)) {
        $updateFields[] = "email = '$email'";
    }

    // Check if there are any fields to update
    if (!empty($updateFields)) {
        $sql .= implode(", ", $updateFields);
        $sql .= " WHERE user_id = '$userId'";

        if ($conn->query($sql) === TRUE) {
            if($_SESSION['acc_type']=='admin')
                header("Location: ../view/adminpanel.php"); // Redirect back to admin panel on success
            else
                header("Location: ../view/index.php");
            exit;
        } else {
            echo "Error updating user: " . $conn->error;
        }
    } else {
        echo "Nothing to update.";
    }
}

// Close the database connection
$conn->close();
?>
