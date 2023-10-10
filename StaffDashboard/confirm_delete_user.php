<?php
// Include your database connection script (e.g., dbconnect.php)
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    // Retrieve the username from the form
    $username = $_POST['username'];

    // Check if the user is logged in and has appropriate privileges (e.g., admin)
    // You should implement your authentication and authorization logic here

    // Delete user from the database
    $sql = "DELETE FROM user WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
                    header("Location: usermanage.php"); // Redirect back to the user management page

        // You can redirect the user to a different page after successful delete if needed
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "Invalid request.";
}
?>
