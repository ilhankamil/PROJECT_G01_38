<?php
$hostname = 'localhost'; // Replace with your database hostname
$database = 'sd'; // Replace with your database name
$username = 'your_username'; // Replace with your database username
$password = 'your_password'; // Replace with your database password

// Create a MySQLi connection
$conn = new mysqli($hostname, $username, $password, $sd);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected to the database successfully!";
?>
