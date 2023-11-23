<?php
// Include the database connection file
include('../admindashboard/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new content from the form submission
    $newContent = $_POST['newContent'];

    // SQL query to update the content in the database
    $query = "UPDATE about_us_content SET content = :newContent WHERE id = 1"; // Assuming '1' is the ID of the "About Us" content

    try {
        // Prepare the SQL query
        $stmt = $pdo->prepare($query);

        // Bind the new content to the query
        $stmt->bindParam(':newContent', $newContent, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Redirect back to the about.php page with a success query parameter
        header("Location: about.php?success=1");
        exit();
    } catch (PDOException $e) {
        // Handle any errors that occur during the query
        echo 'Error: ' . $e->getMessage();
    }
}
?>
