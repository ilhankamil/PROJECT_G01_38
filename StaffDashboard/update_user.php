<?php
// Include your database connection script (e.g., dbconnect.php)
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['new_username']) && isset($_POST['new_email'])) {
    // Retrieve data from the form
    $username = $_POST['username'];
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];

    // Check if the user is logged in and has appropriate privileges (e.g., admin)
    // You should implement your authentication and authorization logic here

    // Update user information in the database
    $sql = "UPDATE user SET username = :new_username, email = :new_email WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':new_username', $newUsername, PDO::PARAM_STR);
    $stmt->bindParam(':new_email', $newEmail, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "User information updated successfully.";
        // You can redirect the user to a different page after successful update if needed
    } else {
        echo "Error updating user information.";
    }
} else {
    echo "Invalid request.";
}
?>
