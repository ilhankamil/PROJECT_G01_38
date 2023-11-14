<?php
include 'dbconnect.php';

$dateInput = $_POST['dateInput'];
$timeInput = $_POST['timeInput'];
$hoursInput = $_POST['hoursInput'];
$courtID = $_POST['courtID'];

/*
$dateInput = "2023-11-06";
$timeInput = "12:20:00";
$hoursInput = 2;
$courtID = "C1";
*/

// Format the timeInput to ensure it's in "hh:MM:ss" format
$timeInput = date("H:i:s", strtotime($timeInput));

// Create the end time based on user input
$endHour = date('H:i:s', strtotime($timeInput) + $hoursInput * 3600);

/*
echo "User Input:";
echo "<br>time:",$timeInput;
echo "<br>End hour:",$endHour;
echo "<br>date:",$dateInput;
*/

// Query the database to check if the selected time is taken
$sql = "SELECT date, start_time, end_time FROM booking WHERE courtID = ? AND date = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $courtID, $dateInput);
$stmt->execute();
$result = $stmt->get_result();

$isTaken = false;

// Check if the selected time is within any booked time slots
while ($row = $result->fetch_assoc()) {
    
    $startTime = $row['start_time'];
   // $endTime = $row['end_time'];

    $endTime = date("H:i:s", strtotime($row['end_time'])); // Add 10 minutes tolerance if

    /*
    echo "<br>Database:";
    echo"<br>Stat Time:",$startTime;
    echo"<br>End Time:",$endTime;
    */

    if ( $endHour> $startTime && $timeInput < $endTime ) {
        //echo "<br>Time has been taken";
        $isTaken = true;
        break; // Exit the loop as the time is taken
    }
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the result as a JSON response
$response = ['isTaken' => $isTaken];
echo json_encode($response);


?>
