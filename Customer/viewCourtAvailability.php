<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedDate = $_POST['date'] ?? date('Y-m-d');
    displayCourtAvailability($selectedDate);
}

function displayCourtAvailability($selectedDate) {
    include "dbconnect.php"; 
    
    $sql = "SELECT * FROM court_availability WHERE date = '$selectedDate'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Court Availability for Date: $selectedDate</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Court Number</th><th>Start Time</th><th>End Time</th><th>Status</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['courtName'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['end_time'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No court availability data found for the selected date.";
    }

    $conn->close();
}

?>
