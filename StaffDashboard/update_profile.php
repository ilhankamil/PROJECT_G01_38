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
                // Passwords match, hash the new password
                $hashedPassword = password_hash($updatePassword, PASSWORD_DEFAULT);
                $userUpdates[] = "password = '$hashedPassword'";
            } else {
                // Passwords do not match
                $responseMessage = 'Password and re-type password do not match';
            }
        } elseif ($updatePassword || $renewPassword) {
            // Either new password or re-type password is provided, but not both
            $responseMessage = 'Both new password and re-type password are required';
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
        header("Location: profile.php?error=1&message=" . urlencode('Admin not found for the specified email')); 
    }

    mysqli_close($conn); // Close the database connection
} else {
    // Invalid request
    header("Location: profile.php?error=1&message=" . urlencode('Invalid request'));
}

?>

<?php
/*
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
*/
?>
