<?php


function getListOfFutureBookingByCustomer($username) {
    $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // Exclude bookings with a "passed" status
        $sql = "SELECT * FROM booking WHERE (name = '$username' OR email = '$username') AND date >= CURDATE() AND status <> 'passed' ORDER BY date";
        $qry = mysqli_query($conn, $sql);

       // echo "Debug SQL Query: " . $sql . "<br>";

        if (!$qry) {
            die("SQL Error: " . mysqli_error($conn));
        }

        return $qry;
    }
}
    
    function getListOfPastBookingByCustomer($username) {
        $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // Get list of past bookings where the date is before or on the current date
        $currentDate = date("Y-m-d");
        $sql = "SELECT * FROM booking WHERE name='$username' AND (date < '$currentDate' OR (date = '$currentDate' AND status = 'passed')) ORDER BY date";
        $qry = mysqli_query($conn, $sql);
    
        if (!$qry) {
            die("SQL Error: " . mysqli_error($conn));
        }
    
        return $qry;
    }
    
    function showBookingList($qryBookingList, $listType) {
        $noOfBookingRecord = mysqli_num_rows($qryBookingList);
    
        if ($noOfBookingRecord == 0) {
            echo '<br><br>There is no record for ' . $listType . ' found';
            return;
        } else {
            echo '<br>List of ' . $listType . '. ' . $noOfBookingRecord . ' record/s found';
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped table-hover">';
            echo '<thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Booking Reference</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>';
            $i = 1;
            while ($row = mysqli_fetch_assoc($qryBookingList)) {
                $startDate = date_create($row['date']);
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row['booking_reference'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . date_format($startDate, "d/m/Y") . '</td>';
                echo '<td>' . $row['start_time'] . '</td>';
                echo '<td>' . $row['end_time'] . '</td>';
                echo '<td>' . 'RM '. $row['price'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '</tr>';
                $i++;
            }
    
            echo '</table>';
            echo '</div>';
        }
    }
    


  ?>