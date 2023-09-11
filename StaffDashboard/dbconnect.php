<?php
$host = "localhost"; // Change to your database host
$dbname = "proonebadmintoncentre"; // Change to your database name
$username = "proadmin38"; // Change to your database username
$password = "proadmin38"; // Change to your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
