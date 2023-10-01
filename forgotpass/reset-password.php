<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h1>Reset Password</h1>

<form id="reset-form">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

    <label for="password">New password</label>
    <input type="password" id="password" name="password">

    <label for="password_confirmation">Repeat password</label>
    <input type="password" id="password_confirmation" name="password_confirmation">

    <button id="reset-button">Send</button>
</form>

<div id="error-message" style="color: red;"></div>

<script>
    document.getElementById("reset-button").addEventListener("click", function (e) {
        e.preventDefault();

        const form = document.getElementById("reset-form");
        const errorMessage = document.getElementById("error-message");

        fetch("process-reset-password.php", {
            method: "POST",
            body: new FormData(form),
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                errorMessage.textContent = data.error;
            } else if (data.success) {
                errorMessage.style.color = "green";
                errorMessage.textContent = data.success;
                // Check for a "redirect" key in the response
                if (data.redirect) {
                // Redirect to the specified URL
                window.location.href = data.redirect;
                }
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
</script>

</body>
</html>