<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
    <meta name="description" content="Simple Forgot Password Page Using HTML and CSS">
    <meta name="keywords" content="forgot password page, basic html and css">
    <title>Forgot Password Page - HTML + CSS</title>
    <link rel="stylesheet" href="thestyle.css">
</head>
<body>
 <div class="row">
        <h1>Forgot Password</h1>
        <h6 class="information-text">Enter your registered email to reset your password.</h6>

    <form method="post" action="send-password-reset.php">
            <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <button onclick="showSpinner()">Reset Password</button>

            </div>
        </form>

</body> <!-- Forgotpassword page -->
</html>