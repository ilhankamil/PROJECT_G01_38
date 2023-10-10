<?php
include('dbconnect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission to add a new customer to the database
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $userType = "customer"; // Set the user type to "customer"

        // Check if the user already exists in the database (you may want to add more validation)
        $stmt = $pdo->prepare("SELECT username FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // User already exists, handle the error (e.g., display a message)
            echo "User already exists.";
        } else {
            // Insert the new customer into the database
            $stmt = $pdo->prepare("INSERT INTO user (username, email, password, userType) VALUES (:username, :email, :password, :userType)");

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':userType', $userType, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // Customer added successfully, you can redirect or display a success message
                header("Location: usermanage.php"); // Redirect to the user management page
                exit();
            } else {
                // Error handling (e.g., display an error message)
                echo "Error adding customer.";
            }
        }
    }
}
?>

<!-- Your HTML form here (with username, email, and password inputs) -->
