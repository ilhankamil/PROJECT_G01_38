<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newContent = $_POST["newContent"];
    
    // Validate and sanitize the user input as needed.
    
    // Specify the path to the about.php file.
    $aboutFilePath = './webpage/contact.php'; //add homeppage about.php

    // Read the content of "about.php" into a string.
    $fileContent = file_get_contents($aboutFilePath);

    // Use regular expressions to find and replace the content within the <p> tag.
    $updatedContent = preg_replace('/<p>(.*?)<\/p>/', '<p>' . $newContent . '</p>', $fileContent);

    // Write the updated content back to "about.php".
    file_put_contents($aboutFilePath, $updatedContent);

    // Redirect back to the original page or display a success message.
    header("Location: contact.php"); //this is edit about page on the admin dashboaard
}
?>
