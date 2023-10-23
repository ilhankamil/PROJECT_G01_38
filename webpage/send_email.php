<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address. Please provide a valid email.';
    } else {
        $to = 'ilhankmil@gmail.com';
        $headers = 'From: ' . $email;

        if (mail($to, $subject, $message, $headers)) {
            echo 'Email sent successfully. Thank you for contacting us!';
        } else {
            echo 'Email sending failed. Please try again later.';
        }
    }
} else {
    echo 'Invalid form submission.';
}
?>
