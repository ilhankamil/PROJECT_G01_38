<?php
include 'dbconnect.php';

// Check if courtID is provided in the POST request
if (isset($_POST['courtID'])) {
    
    $courtID = $_POST['courtID'];

    // Prepare and execute a database query to retrieve availability data
    $sql = "SELECT courtName,date,time,end_time,status FROM court_availability WHERE courtID = '$courtID'";
    
    // Use mysqli_query to execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        $availabilityData = [];

        // Check if there are available courts for the given courtID
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $availabilityData[] = [
                    'courtName' => $row['courtName'],
                    'date' => $row['date'],
                    'time' => $row['time'],
                    'end_time' => $row['end_time'],
                    'status' => $row['status'],
                ];
            }
        }

        // Close the result set
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($conn);

        // Return the availability data as a JSON response
        echo json_encode($availabilityData);
    } else {
        echo json_encode(['error' => 'Failed to execute the query.']);
    }
} else {
    // If courtID is not provided, return an error response
    echo json_encode(['error' => 'courtID is required.']);
}
?>



function loadBookingData() {
            const dateInput = document.getElementById('selecteddate');
            const selectedCourtInput = document.getElementById('selectedcourt');
            const date = dateInput.value;
            const selectedCourt = selectedCourtInput.value;

            $.ajax({
                type: 'GET',
                url: 'GettingCourtBookingData.php',
                data: { courtID: selectedCourt, date: date },
                dataType: 'json',
                success: function (data) {
                    const tableBody = $('#tableBody');
                    tableBody.empty();

                    if (data.error) {
                        console.error('An error occurred:', data.error);
                        alert('An error occurred while fetching data.');
                    } else {
                        $.each(data, function (index, row) {
                            var tableRow = $('<tr>');
                            tableRow.append('<td>' + row.booking_reference + '</td>');
                            tableRow.append('<td>' + row.name + '</td>');
                            tableRow.append('<td>' + row.email + '</td>');
                            tableRow.append('<td>' + row.phonenumber + '</td>');
                            tableRow.append('<td>' + row.day + '</td>');
                            tableRow.append('<td>' + row.date + '</td>');
                            tableRow.append('<td>' + row.start_time + '</td>');
                            tableRow.append('<td>' + row.end_time + '</td>');
                            tableRow.append('<td>' + row.hours + '</td>');
                            tableRow.append('<td>' + row.price + '</td>');
                            tableRow.append('<td>' + row.status + '</td>');
                            tableBody.append(tableRow);
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('An error occurred: ' + textStatus + '\n' + errorThrown);
                }
            });
        }









        <?php

$conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['courtID']) && isset($_GET['date'])) {
    $courtID = $_GET['courtID'];
    $date = $_GET['date'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT booking_reference, name, email, phonenumber, day, date, start_time, end_time, hours, price, status FROM booking WHERE court = ? AND date = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $query)) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ss", $courtID, $date);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            $data = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = [
                        'booking_reference' => $row['booking_reference'],
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phonenumber' => $row['phonenumber'],
                        'day' => $row['day'],
                        'date' => $row['date'],
                        'start_time' => $row['start_time'],
                        'end_time' => $row['end_time'],
                        'hours' => $row['hours'],
                        'price' => $row['price'],
                        'status' => $row['status'],
                    ];
                }
                echo json_encode($data);
            } else {
                echo json_encode(['error' => 'No data found.']);
            }
        } else {
            echo json_encode(['error' => 'Query error: ' . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['error' => 'Statement preparation error: ' . mysqli_error($conn)]);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['error' => 'Missing courtID or date.']);
}

mysqli_close($conn);
?>
