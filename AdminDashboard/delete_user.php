<?php
// Include your database connection script (e.g., dbconnect.php)
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    // Retrieve the username from the URL parameter
    $username = $_GET['username'];

    // Check if the user is logged in and has appropriate privileges (e.g., admin)
    // You should implement your authentication and authorization logic here

    // Fetch user data from the database based on the username
    $sql = "SELECT * FROM user WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Display a confirmation message and form to delete the user
        echo "<h1>Delete User: " . $user['username'] . "</h1>";
        echo "<p>Are you sure you want to delete this user?</p>";
        echo "<form method='POST' action='confirm_delete_user.php'>";
        echo "<input type='hidden' name='username' value='" . $user['username'] . "'>";
        echo "<input type='submit' value='Confirm Delete'>";
        echo "</form>";
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
