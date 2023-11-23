<?php
include('dbconnect.php'); // Include your database connection

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    $username = $_GET['username'];

    // Check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User exists; you can delete the user from the database
        $userType = $user['userType'];

        if ($userType == 'customer') {
            // Delete user data from the customer table
            $deleteCustomerStmt = $pdo->prepare("DELETE FROM customer WHERE username = :username");
            $deleteCustomerStmt->bindParam(':username', $username, PDO::PARAM_STR);

            if ($deleteCustomerStmt->execute()) {
                // Now delete the user from the user table
                $deleteUserStmt = $pdo->prepare("DELETE FROM user WHERE username = :username");
                $deleteUserStmt->bindParam(':username', $username, PDO::PARAM_STR);

                if ($deleteUserStmt->execute()) {
                    // User deleted successfully
                    $response['success'] = true;
                    $response['message'] = "Customer, " . $username . " has been deleted.";
                } else {
                    // Error handling
                    $response['success'] = false;
                    $response['message'] = "Error deleting customer user.";
                }
            } else {
                // Error handling
                $response['success'] = false;
                $response['message'] = "Error deleting customer user data.";
            }
        } else {
            // Invalid user type
            $response['success'] = false;
            $response['message'] = "Invalid user type. Only customers can be deleted.";
        }
    } else {
        // User not found
        $response['success'] = false;
        $response['message'] = "User not found.";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
