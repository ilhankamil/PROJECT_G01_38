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

// Generate the query to get the monthly revenue
$query = "SELECT DATE_FORMAT(date, '%b') AS month, SUM(price) AS total_revenue
          FROM booking
          WHERE status IN ('booked', 'using')
          GROUP BY MONTH(date)";

// Execute the query
$result = $conn->query($query);

// Create an array to hold the results
$revenueByMonth = [];

// Iterate through the result set and populate the array
while ($row = $result->fetch_assoc()) {
    $revenueByMonth[] = [
        'month' => $row['month'],
        'total_revenue' => (float) $row['total_revenue'],
    ];
}

// Close the database connection
$conn->close();

// Fill in missing months with zero revenue
$months = [
    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
];

foreach ($months as $month) {
    $found = false;
    foreach ($revenueByMonth as $item) {
        if ($item['month'] === $month) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $revenueByMonth[] = [
            'month' => $month,
            'total_revenue' => 0.0,
        ];
    }
}

// Sort the array by month
usort($revenueByMonth, function ($a, $b) use ($months) {
    return array_search($a['month'], $months) - array_search($b['month'], $months);
});

// Output the result as JSON
echo json_encode($revenueByMonth);
?>