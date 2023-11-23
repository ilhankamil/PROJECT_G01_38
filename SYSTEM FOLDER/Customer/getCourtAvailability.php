<?php
include 'dbconnect.php';

$jsonStr = file_get_contents('php://input');
  $jsonObj = json_decode($jsonStr);


// Check if courtID is provided in the POST request
if ($jsonObj) {
    
    $courtID = $jsonObj->courtID;
    $chosenDate =$jsonObj->chosenDate;

    // Prepare and execute a database query to retrieve availability data
    $sql = "SELECT courtName,date,start_time,end_time,status FROM booking WHERE courtID = '$courtID' AND date = '$chosenDate'";
    
    // Use mysqli_query to execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
    
            // Echo the table row here if you want to display it immediately
            echo '<tr>';
            echo '<td>' . $row['courtName'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['start_time'] . '</td>';
            echo '<td>' . $row['end_time'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }
    } else {
        // If no data is available, you can echo an appropriate message as a table row
        echo '<tr><td colspan="5">No Court Booked.</td></tr>';
    }
    
} else {
    // If courtID is not provided, return an error response
   // echo json_encode(['error' => 'courtID is required.']);
}
?>

