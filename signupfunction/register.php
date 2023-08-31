<?php
session_start();


$uname = $_POST['uname'];
$password = $_POST['password'];
$email = $_POST['email'];

// Set the default value for userType to 'customer'
$userType = 'customer';


if(empty($uname) || empty($email) || empty($password)) {
    $_SESSION['error'] = "Please fill in all fields";
    header("Location: register.php");
    exit();
}



$conn=mysqli_connect("localhost","proadmin38","proadmin38","proonebadmintoncentre");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the email is already registered
$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['error'] = "This email has already registered";
    header("Location: registerPage.php");
    exit();
}


/// Insert the customer data into the database
$sql = "INSERT INTO customer (username,email,password) VALUES ('$uname','$email','$password');";
$sql .= "INSERT INTO user (username,email,password,userType) VALUES ('$uname','$email','$password','$userType')";

if (mysqli_multi_query($conn, $sql)) {
    $_SESSION['success'] = "You have been registered successfully";
    header("Location: ../mainMenu.php"); // after registed successfully, return back user to index.html
    exit();
} else {
    $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: registerpage.php"); //if fail to register, return back to register page
    exit();                               // need to create pop out to display error
}


$connn->close();
?>
