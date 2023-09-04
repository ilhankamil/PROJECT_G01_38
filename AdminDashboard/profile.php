<?php
// Assuming you have user data in a session or fetched from a database
$userName = "Ilhan Kamil"; // Replace with actual user data
$userEmail = "ilhan@example.com"; // Replace with actual user data
?>

<!-- HTML for displaying profile information -->
<div class="container mt-4">
    <h1>Profile</h1>
    <p><strong>Name:</strong> <?php echo $userName; ?></p>
    <p><strong>Email:</strong> <?php echo $userEmail; ?></p>
    <!-- Add more profile information here -->
    <a class="btn btn-primary" href="edit_profile.php">Edit Profile</a>
</div>
