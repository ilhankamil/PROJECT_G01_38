<?php
// Include your database connection code or configuration file here
// Example: require_once 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted data
    $newFullName = $_POST['newFullName'];
    $newEmail = $_POST['newEmail'];

    // Perform data validation (you can add more validation as needed)
    $errors = array();

    if (empty($newFullName)) {
        $errors[] = "Full Name is required.";
    }

    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // If there are validation errors, redirect back with errors
    if (!empty($errors)) {
        $errorMessages = implode("<br>", $errors);
        header("Location: profile.php?error=1&message=$errorMessages");
        exit;
    }

    // Connect to the database (modify this according to your database setup)
    $servername = "localhost";
    $username = "proadmin38";
    $password = "proadmin38";
    $dbname = "proonebadmintoncentre";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have a 'users' table with columns 'full_name' and 'email'
    // Also, make sure to replace 'user_id' with the actual identifier for the user you're updating
    $userId = 1; // Replace with the user's ID

    // Update the user's profile in the database
    $query = "UPDATE users SET full_name = '$newFullName', email = '$newEmail' WHERE user_id = $userId";

    if ($conn->query($query) === TRUE) {
        // Profile updated successfully
        header("Location: profile.php?success=1");
    } else {
        // Error occurred during the update
        header("Location: profile.php?error=1");
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect if the form wasn't submitted via POST
    header("Location: profile.php");
}

?>
