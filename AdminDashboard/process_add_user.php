<?php
include('dbconnect.php');

// Function to check if a username is taken
function isUsernameTaken($username, $pdo) {
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result !== false;
}

// Function to check if an email is taken
function isEmailTaken($email, $pdo) {
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result !== false;
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $userType = $_POST['userType'];

    // Check if username or email is already taken
    if (isUsernameTaken($username, $pdo)) {
        echo '<script>alert("Username is taken"); window.location.href = "add_user.php";</script>';
        exit;
    }

    if (isEmailTaken($email, $pdo)) {
        echo '<script>alert("Email is taken"); window.location.href = "add_user.php";</script>';
        exit;
    }

    // Validate the password against the regex
    $password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
    if (!preg_match($password_regex, $password)) {
        echo '<script>alert("Password does not meet requirements"); window.location.href = "add_user.php";</script>';
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the appropriate table based on userType
    if ($userType === 'customer') {
        $insertCustomer = "INSERT INTO customer (username, email, phonenumber, password) VALUES (?, ?, ?, ?)";
        $stmtCustomer = $pdo->prepare($insertCustomer);
        $stmtCustomer->execute([$username, $email, $phonenumber, $hashedPassword]); // Store hashed password
    } elseif ($userType === 'staff') {
        $insertStaff = "INSERT INTO staff (username, email, phonenumber, password) VALUES (?, ?, ?, ?)";
        $stmtStaff = $pdo->prepare($insertStaff);
        $stmtStaff->execute([$username, $email, $phonenumber, $hashedPassword]); // Store hashed password
    }

    // Insert into the common user table
    $insertUser = "INSERT INTO user (username, email, password, phonenumber, userType, verified_email) VALUES (?, ?, ?, ?, ?, ?)";
$stmtUser = $pdo->prepare($insertUser);
$stmtUser->execute([$username, $email, $hashedPassword, $phonenumber, $userType, "verified"]); 

    header("Location: usermanage.php");
}
?>
