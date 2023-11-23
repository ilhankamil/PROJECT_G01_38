<?php
// before inserting the new password into the database, this file will check if the token is valid
$token = $_POST["token"]; // this value is from reset-password.php

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

$response = [];

if ($user === null) {
    $response["error"] = "Token not found";
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    $response["error"] = "Token has expired";
}

$password = $_POST["password"];

// Password restrictions
if (strlen($password) < 8) {
    $response["error"] = "Password must be at least 8 characters";
}

if (!preg_match("/[a-z]/", $password)) {
    $response["error"] = "Password must contain at least one lowercase letter";
}

if (!preg_match("/[A-Z]/", $password)) {
    $response["error"] = "Password must contain at least one uppercase letter";
}

if (!preg_match("/\d/", $password)) {
    $response["error"] = "Password must contain at least one number";
}

if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
    $response["error"] = "Password must contain at least one special character";
}

if ($password !== $_POST["password_confirmation"]) {
    $response["error"] = "Passwords must match";
}

if (empty($response)) {
    // If no errors, update the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE user
            SET password = ?,
                reset_token_hash = NULL,
                reset_token_expires_at = NULL
            WHERE id = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("ss", $password_hash, $user["id"]);

    $stmt->execute();

    $response["success"] = "Password updated. You can now login.";

    $response["redirect"] = "../webpage/index.php";
}

// Return JSON response
echo json_encode($response);
?>
