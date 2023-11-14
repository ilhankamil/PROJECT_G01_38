<?php
// Database connection
$host = "localhost"; // Change to your database host
$dbname = "proonebadmintoncentre"; // Change to your database name
$username = "proadmin38"; // Change to your database username
$password = "proadmin38"; // Change to your database password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate the query to get the daily booking count
$query = "SELECT date, COUNT(*) AS total_bookings
          FROM booking
          WHERE date = CURDATE()
          GROUP BY date";

// Execute the query
$result = $conn->query($query);

// Create an array to hold the results
$dailyBookingsData = [];

// Iterate through the result set and populate the array
while ($row = $result->fetch_assoc()) {
    $dailyBookingsData[] = [
        'date' => $row['date'],
        'total_bookings' => (int) $row['total_bookings'],
    ];
}

// Close the result set
$result->close();

// Close the database connection
$conn->close();


?>
