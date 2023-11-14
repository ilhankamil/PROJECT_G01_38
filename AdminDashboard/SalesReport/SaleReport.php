

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

  <canvas id="myChart"></canvas>

  <script>
    // Get the data from the backend
    var data = <?php

// Connect to the database
require_once __DIR__ ."../../dbconnect.php";

// Query to retrieve monthly sales data
$query = "SELECT DATE_FORMAT(date, '%b') AS month, COUNT(*) AS total_sales
          FROM booking
          WHERE date >= '2023-01-01' AND date <= '2023-12-31'
          GROUP BY DATE_FORMAT(date, '%m')
          ORDER BY DATE_FORMAT(date, '%m')";

// Execute the query
$result = $conn->query($query);

// Fetch the results as an associative array
$results = $result->fetch_all(MYSQLI_ASSOC);

// Create an array to store the monthly sales data
$monthlySalesData = array();

// Initialize the monthly sales data for all months as 0
$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
foreach ($months as $month) {
    $monthlySalesData[] = array('month' => $month, 'total_sales' => 0);
}

// Iterate over the query results and update the monthly sales data
foreach ($results as $row) {
    $month = $row['month'];
    $totalSales = (int) $row['total_sales'];

    // Update the monthly sales data for the corresponding month
    foreach ($monthlySalesData as &$data) {
        if ($data['month'] === $month) {
            $data['total_sales'] = $totalSales;
            break;
        }
    }
}

// Convert the monthly sales data to JSON format
$jsonData = json_encode($monthlySalesData);

// Output the JSON data
echo $jsonData;

// Close the database connection
$conn->close();

?>

    // Create the chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: data.map(d => d.month),
        datasets: [{
          label: 'Total Sales',
          data: data.map(d => d.total_sales),
          backgroundColor: 'rgba(0, 0, 255, 0.2)',
          borderColor: 'rgba(0, 0, 255, 1)',
          borderWidth: 1
        }]
      },
      options: {
        title: {
          display: true,
          text: 'Total Sales by Date (<?php echo date('Y'); ?>)'
        }
      }
    });
  </script>

