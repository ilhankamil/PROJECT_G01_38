<?php
// Include the database connection file
include('../staffdashboard/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new content from the form
    $newContent = $_POST['newContent'];

    // Query to update the "Contact Us" content
    $query = "UPDATE contact_us_content SET content = :newContent WHERE id = 1"; // Assuming '1' is the ID of the "Contact Us" content

    try {
        // Prepare the SQL query
        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(':newContent', $newContent, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect back to the edit page with a success message
            header('Location: contact.php?success=1');
            exit();
        } else {
            echo 'Failed to update Contact Us content.';
        }
    } catch (PDOException $e) {
        // Handle any errors that occur during the query
        echo 'Error: ' . $e->getMessage();
    }
}
?>
