<?php
session_start();

// Check if the staff is logged in
if (!isset($_SESSION['uname_or_email'])) {
    header("Location: ../webpage/index.php"); // Redirect to the login page if not logged in
    exit();
}

// Include your database connection code here
include "dbconnect.php";

// Initialize a response message
$responseMessage = '';

if (isset($_POST['newUsername']) || isset($_POST['newEmail']) || isset($_POST['newPassword'])) {
    // Get the user's email from the session
    $username_or_email = $_SESSION['uname_or_email']; 

    // Check which fields are being updated
    $updateUsername = isset($_POST['newUsername']) ? $_POST['newUsername'] : null;
    $updateEmail = isset($_POST['newEmail']) ? $_POST['newEmail'] : null;
    $updatePassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : null;
    $renewPassword = isset($_POST['renewPassword']) ? $_POST['renewPassword'] : null;

    // Initialize an array to store the updates for the 'user' and 'staff' tables
    $userUpdates = array();
    $staffUpdates = array();

    // Create the SQL query to retrieve the staff's username based on their email
    $staffUsernameQuery = "SELECT username FROM staff WHERE email = '$username_or_email' OR username = '$username_or_email'";
    $result = mysqli_query($conn, $staffUsernameQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $staffUsername = $row['username'];

        // Create the SQL query for the 'user' table based on the fields being updated
        $userSql = "UPDATE user SET ";

        if ($updateUsername) {
            $userUpdates[] = "username = '$updateUsername'";
        }

        if ($updateEmail) {
            $userUpdates[] = "email = '$updateEmail'";
            // Update the session variable with the new email
            $_SESSION['uname_or_email'] = $updateEmail;
        }

        if ($updatePassword && $renewPassword) {
            // Both new password and re-type password are provided
            if ($updatePassword === $renewPassword) {
                // Check if the password meets the specified criteria
                if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W).{8,}$/', $updatePassword)) {
                    // Passwords match and meet criteria, hash the new password
                    $hashedPassword = password_hash($updatePassword, PASSWORD_DEFAULT);
                    $userUpdates[] = "password = '$hashedPassword'";
                } else {
                    // Passwords do not meet criteria
                    $responseMessage = 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character, and be at least 8 characters long.';

                    // Display the error message and exit without performing any updates
                    header("Location: profile.php?error=1&message=" . urlencode($responseMessage));
                    exit();
                }
            } else {
                // Passwords do not match
                $responseMessage = 'Password and re-type password do not match';

                // Display the error message and exit without performing any updates
                header("Location: profile.php?error=1&message=" . urlencode($responseMessage));
                exit();
            }
        } elseif ($updatePassword || $renewPassword) {
            // Either new password or re-type password is provided, but not both
            $responseMessage = 'Both new password and re-type password are required';

            // Display the error message and exit without performing any updates
            header("Location: profile.php?error=1&message=" . urlencode($responseMessage));
            exit();
        }

        // Combine the updates into the SQL query for the 'user' table
        $userSql .= implode(", ", $userUpdates);

        // Add a WHERE clause to update the specific user in the 'user' table
        $userSql .= " WHERE email = '$username_or_email' OR username = '$username_or_email'"; // Use the user's email as the identifier

        if (mysqli_query($conn, $userSql)) {
            // Update for the 'user' table was successful

            // Now, create a similar SQL query to update the 'staff' table using the retrieved staff username
            $staffSql = "UPDATE staff SET ";

            if ($updateUsername) {
                $staffUpdates[] = "username = '$updateUsername'";
            }

            if ($updateEmail) {
                $staffUpdates[] = "email = '$updateEmail'";
            }

            if ($updatePassword && $renewPassword) {
                // Passwords match, hash the new password for the staff
                $hashedPassword = password_hash($updatePassword, PASSWORD_DEFAULT);
                $staffUpdates[] = "password = '$hashedPassword'";
            }

            // Combine the updates into the SQL query for the 'staff' table
            $staffSql .= implode(", ", $staffUpdates);

            // Add a WHERE clause to update the specific staff in the 'staff' table using the retrieved staff username
            $staffSql .= " WHERE username = '$staffUsername'"; // Use the staff's username as the identifier
            
            if (mysqli_query($conn, $staffSql)) {
                // Update for the 'staff' table was successful
                // Handle success
                if ($updateUsername) {
                    $_SESSION['uname_or_email'] = $updateUsername;
                    
                }
                
               // Set success message as a query parameter
               header("Location: profile.php?success=1");
               exit();

            } else {
                // Error updating 'staff' table
                // Handle error
                 header("Location: profile.php?error=1&message=" . urlencode('Error while updating profile'));
                exit();
            }
        } else {
            // Error occurred during the update for the 'user' table
            header("Location: profile.php?error=1&message=" . urlencode('Error while updating profile: ' . mysqli_error($conn)));
            exit();
        }
    } else {
        // staff with the specified email not found
        header("Location: profile.php?error=1&message=" . urlencode('Staff not found for the specified email')); 
    }

    mysqli_close($conn); // Close the database connection
} else {
    // Invalid request
    header("Location: profile.php?error=1&message=" . urlencode('Invalid request'));
}
?>
