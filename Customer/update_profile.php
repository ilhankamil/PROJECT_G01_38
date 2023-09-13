<?php
session_start();

// Check if the customer is logged in
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

    // Initialize an array to store the updates for the 'user' and 'customer' tables
    $userUpdates = array();
    $customerUpdates = array();

    // Create the SQL query to retrieve the customer's username based on their email
    $customerUsernameQuery = "SELECT username FROM customer WHERE email = '$username_or_email' OR username = '$username_or_email'";
    $result = mysqli_query($conn, $customerUsernameQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $customerUsername = $row['username'];

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

            // Now, create a similar SQL query to update the 'customer' table using the retrieved customer username
            $customerSql = "UPDATE customer SET ";

            if ($updateUsername) {
                $customerUpdates[] = "username = '$updateUsername'";
            }

            if ($updateEmail) {
                $customerUpdates[] = "email = '$updateEmail'";
            }

            if ($updatePassword && $renewPassword) {
                // Passwords match, hash the new password for the customer
                $hashedPassword = password_hash($updatePassword, PASSWORD_DEFAULT);
                $customerUpdates[] = "password = '$hashedPassword'";
            }

            // Combine the updates into the SQL query for the 'customer' table
            $customerSql .= implode(", ", $customerUpdates);

            // Add a WHERE clause to update the specific customer in the 'customer' table using the retrieved customer username
            $customerSql .= " WHERE username = '$customerUsername'"; // Use the customer's username as the identifier
            
            if (mysqli_query($conn, $customerSql)) {
                // Update for the 'customer' table was successful
                // Handle success
                if ($updateUsername) {
                    $_SESSION['uname_or_email'] = $updateUsername;
                }

                // Set success message as a query parameter
                header("Location: profile.php?success=1");
                exit();

            } else {
                // Error updating 'customer' table
                // Handle error
                // Set error message as a query parameter
                header("Location: profile.php?error=1&message=" . urlencode('Error while updating profile'));
                exit();
            }
        } else {
            // Error occurred during the update for the 'user' table
            header("Location: profile.php?error=1&message=" . urlencode('Error while updating profile: ' . mysqli_error($conn)));
            exit();
        }
    } else {
        // customer with the specified email not found
        header("Location: profile.php?error=1&message=" . urlencode('Customer not found for the specified email')); 
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
include "dbconnect.php";

session_start(); // Start a session if not already started

// Check if the user is logged in and has an active session
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission and update the profile
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    
    // Validate and sanitize the inputs as needed

    // Update the admin's profile in the database
    $updateQuery = "UPDATE admin SET username = ?, email = ? WHERE username = ?";
    
    if ($stmt = $conn->prepare($updateQuery)) {
        $stmt->bind_param("sss", $newUsername, $newEmail, $_SESSION['admin']['username']);
        
        if ($stmt->execute()) {
            // Update was successful
            $_SESSION['admin']['username'] = $newUsername; // Update the session data
            $_SESSION['admin']['email'] = $newEmail; // Update the session data
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



