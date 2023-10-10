<?php
include('dbconnect.php'); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission to add a new user to the database
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phonenumber']) && isset($_POST['userType'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $phonenumber = $_POST['phonenumber'];
        $userType = $_POST['userType'];

        // Insert the new user into the database
        $stmt = $pdo->prepare("INSERT INTO user (username, email, password, phonenumber, userType) VALUES (:username, :email, :password, :phonenumber, :userType)");

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $stmt->bindParam(':userType', $userType, PDO::PARAM_STR);

if ($stmt->execute()) {
    // User added successfully, update verified_email and verification_code
    $user_id = $pdo->lastInsertId(); // Get the ID of the newly added user

    $stmt = $pdo->prepare("UPDATE user SET verified_email = 1, verification_code = '000000' WHERE id = :id");
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Verification fields updated successfully
        header("Location: usermanage.php"); // Redirect back to the user management page
        exit();
    } else {
            // Error handling (e.g., display an error message)
            echo "Error adding user.";
        }
    }
}
?>
