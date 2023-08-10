<?php
// Database connection settings
require_once '../model/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];

    // Sanitize the input to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $userId);

    // SQL query to delete the user
    $sql = "DELETE FROM users WHERE user_id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
$conn->close();
?>
