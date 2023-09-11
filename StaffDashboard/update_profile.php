<?php
// Include your database connection code here
include('../staffdashboard/dbconnect.php');

session_start(); // Start a session if not already started

// Check if the user is logged in and has an active session
if (!isset($_SESSION['staff'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission and update the profile
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    
    // Validate and sanitize the inputs as needed

    // Update the admin's profile in the database
    $updateQuery = "UPDATE staff SET username = ?, email = ? WHERE username = ?";
    
    if ($stmt = $conn->prepare($updateQuery)) {
        $stmt->bind_param("sss", $newUsername, $newEmail, $_SESSION['staff']['username']);
        
        if ($stmt->execute()) {
            // Update was successful
            $_SESSION['staff']['username'] = $newUsername; // Update the session data
            $_SESSION['staff']['email'] = $newEmail; // Update the session data
            header("Location: profile.php?success=1");
            exit;
        } else {
            // Update failed
            header("Location: profile.php?error=1");
            exit;
        }
        
        $stmt->close();
    } else {
        // SQL statement preparation failed
        header("Location: profile.php?error=1");
        exit;
    }
} else {
    // Handle non-POST requests or other errors
    echo "Invalid request.";
}
?>
