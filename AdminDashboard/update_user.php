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

    // Fetch the user's userType from the database
    $sql = "SELECT userType FROM user WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $userType = $result['userType'];

        // Update user information in the appropriate table
        if ($userType === 'customer') {
            // Update in the customer table
            $updateCustomerSql = "UPDATE customer SET username = :new_username, email = :new_email WHERE username = :username";
            $stmtCustomer = $pdo->prepare($updateCustomerSql);
            $stmtCustomer->bindParam(':new_username', $newUsername, PDO::PARAM_STR);
            $stmtCustomer->bindParam(':new_email', $newEmail, PDO::PARAM_STR);
            $stmtCustomer->bindParam(':username', $username, PDO::PARAM_STR);
            $stmtCustomer->execute();
        } elseif ($userType === 'staff') {
            // Update in the staff table
            $updateStaffSql = "UPDATE staff SET username = :new_username, email = :new_email WHERE username = :username";
            $stmtStaff = $pdo->prepare($updateStaffSql);
            $stmtStaff->bindParam(':new_username', $newUsername, PDO::PARAM_STR);
            $stmtStaff->bindParam(':new_email', $newEmail, PDO::PARAM_STR);
            $stmtStaff->bindParam(':username', $username, PDO::PARAM_STR);
            $stmtStaff->execute();
        }

        // Update in the common user table
        $updateUserSql = "UPDATE user SET username = :new_username, email = :new_email WHERE username = :username";
        $stmtUser = $pdo->prepare($updateUserSql);
        $stmtUser->bindParam(':new_username', $newUsername, PDO::PARAM_STR);
        $stmtUser->bindParam(':new_email', $newEmail, PDO::PARAM_STR);
        $stmtUser->bindParam(':username', $username, PDO::PARAM_STR);
        
        if ($stmtUser->execute()) {
            header("Location: usermanage.php"); // Redirect to the user management page
            exit;
        } else {
            echo "Error updating user information.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
