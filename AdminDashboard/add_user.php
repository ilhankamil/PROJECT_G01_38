<?php
include('dbconnect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission to add a new user to the database
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        // Check if the user already exists in the database (you may want to add more validation)
        $stmt = $pdo->prepare("SELECT username FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // User already exists, handle the error (e.g., display a message)
            echo "User already exists.";
        } else {
            // Insert the new user into the database
            $stmt = $pdo->prepare("INSERT INTO user (username, email, password, userType) VALUES (:username, :email, :password, :userType)");
            $userType = "customer"; // You can change this to "staff" if needed

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':userType', $userType, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // User added successfully, you can redirect or display a success message
                header("Location: usermanage.php"); // Redirect to the user management page
                exit();
            } else {
                // Error handling (e.g., display an error message)
                echo "Error adding user.";
