<?php
// Set the time zone to Kuala Lumpur, Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');

set_time_limit(300);

// Infinite loop to continuously check court bookings
while (true) {
    $username = 'DavidG';
    checkCourtBookings();
    checkUserBookings($username);
    sleep(60); // Adjust the sleep interval as needed, now is 30 seconds
}

function checkCourtBookings() {
    // Define the batch size
    $batchSize = 100; // Adjust as needed
    // Log the start time
    echo "Checking court bookings at: " . date("Y-m-d H:i:s");

    // Connect to the database
    $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$conn) {
        echo "Connection failed: " . mysqli_connect_error();
        return; // Exit the function
    }

    // Check for 'booked' entries where it's time to update to 'using' and the date matches
    $usingTimeQuery = "SELECT id FROM court_availability WHERE status = 'booked' AND time <= NOW() AND DATE = CURDATE() LIMIT $batchSize";
    $usingTimeResult = mysqli_query($conn, $usingTimeQuery);

    if (!$usingTimeResult) {
        echo "Error fetching 'using' time bookings: " . mysqli_error($conn);
        mysqli_close($conn);
        return; // Exit the function
    }

    $countUsingTime = mysqli_num_rows($usingTimeResult);

    if ($countUsingTime > 0) {
        $idsUsingTime = array();
        while ($row = mysqli_fetch_assoc($usingTimeResult)) {
            $idsUsingTime[] = $row['id'];
        }

        // Update the status of 'booked' entries to 'using' where it's time and date match
        $updateUsingTimeQuery = "UPDATE court_availability SET status = 'using' WHERE id IN (" . implode(',', $idsUsingTime) . ")";
        $updateUsingTimeResult = mysqli_query($conn, $updateUsingTimeQuery);

        if (!$updateUsingTimeResult) {
            echo "Error updating 'using' time bookings to 'using': " . mysqli_error($conn);
        } else {
            echo "<br>Updated 'using' time bookings to 'using': $countUsingTime rows";
        }
    } else {
        echo "<br>No 'using' time bookings found.";
    }

    // Check for 'using' entries that need to be marked as 'expired' when the date and end_time match
    $expiredQuery = "SELECT id FROM court_availability WHERE status = 'using' AND end_time <= NOW() AND DATE = CURDATE() LIMIT $batchSize";
    $expiredResult = mysqli_query($conn, $expiredQuery);

    if (!$expiredResult) {
        echo "Error fetching 'using' expired bookings: " . mysqli_error($conn);
        mysqli_close($conn);
        return; // Exit the function
    }

    $countExpired = mysqli_num_rows($expiredResult);

    if ($countExpired > 0) {
        $idsExpired = array();
        while ($row = mysqli_fetch_assoc($expiredResult)) {
            $idsExpired[] = $row['id'];
        }

        // Update the status of 'using' entries to 'expired' when the date and end_time match
        $updateExpiredQuery = "UPDATE court_availability SET status = 'expired' WHERE id IN (" . implode(',', $idsExpired) . ")";
        $updateExpiredResult = mysqli_query($conn, $updateExpiredQuery);

        if (!$updateExpiredResult) {
            echo "Error updating 'using' expired bookings to 'expired': " . mysqli_error($conn);
        } else {
            echo "<br>Updated 'using' expired bookings to 'expired': $countExpired rows";
        }
    } else {
        echo "<br>No 'using' expired bookings found.";
    }

    // Close the database connection
    mysqli_close($conn);
}

function checkUserBookings($username) {
    // Define the batch size
    $batchSize = 100; // Adjust as needed
    // Log the start time
    echo "<br><br>Checking user bookings for $username at: " . date("Y-m-d H:i:s");

    // Connect to the database
    $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$conn) {
        echo "Connection failed: " . mysqli_connect_error();
        return; // Exit the function
    }

    // Check for 'booked' entries in the 'booking' table where it's time to update to 'using' and the date matches
    $usingTimeQuery = "SELECT booking_reference FROM booking WHERE status = 'booked' AND start_time <= NOW() AND DATE = CURDATE() AND (name = '$username' OR email = '$username') LIMIT $batchSize";
    $usingTimeResult = mysqli_query($conn, $usingTimeQuery);

    if (!$usingTimeResult) {
        echo "Error fetching 'using' time bookings: " . mysqli_error($conn);
        mysqli_close($conn);
        return; // Exit the function
    }

    $countUsingTime = mysqli_num_rows($usingTimeResult);

    if ($countUsingTime > 0) {
        $bookingReferencesUsingTime = array();
        while ($row = mysqli_fetch_assoc($usingTimeResult)) {
            $bookingReferencesUsingTime[] = "'" . $row['booking_reference'] . "'";
        }

        // Update the status of 'booked' entries in the 'booking' table to 'using' where it's time and date match
        $updateUsingTimeQuery = "UPDATE booking SET status = 'using' WHERE booking_reference IN (" . implode(',', $bookingReferencesUsingTime) . ")";
        $updateUsingTimeResult = mysqli_query($conn, $updateUsingTimeQuery);

        if (!$updateUsingTimeResult) {
            echo "Error updating 'using' time bookings to 'using': " . mysqli_error($conn);
        } else {
            echo "<br>Updated 'using' time bookings to 'using': $countUsingTime rows";
        }
    } else {
        echo "<br>No 'using' time bookings found.";
    }

    // Check for 'using' entries in the 'booking' table that need to be marked as 'passed' when the date and end_time match
    $expiredQuery = "SELECT booking_reference FROM booking WHERE status = 'using' AND end_time <= NOW() AND DATE = CURDATE() AND (name = '$username' OR email = '$username') LIMIT $batchSize";
    $expiredResult = mysqli_query($conn, $expiredQuery);

    if (!$expiredResult) {
        echo "<br>Error fetching 'using' expired bookings: " . mysqli_error($conn);
        mysqli_close($conn);
        return; // Exit the function
    }

    $countExpired = mysqli_num_rows($expiredResult);

    if ($countExpired > 0) {
        $bookingReferencesExpired = array();
        while ($row = mysqli_fetch_assoc($expiredResult)) {
            $bookingReferencesExpired[] = "'" . $row['booking_reference'] . "'";
        }

        // Update the status of 'using' entries in the 'booking' table to 'passed' when the date and end_time match
        $updateExpiredQuery = "UPDATE booking SET status = 'passed' WHERE booking_reference IN (" . implode(',', $bookingReferencesExpired) . ")";
        $updateExpiredResult = mysqli_query($conn, $updateExpiredQuery);

        if (!$updateExpiredResult) {
            echo "Error updating 'using' expired bookings to 'expired': " . mysqli_error($conn);
        } else {
            echo "<br>Updated 'using' expired bookings to 'expired': $countExpired rows";
        }
    } else {
        echo "<br>No 'using' expired bookings found.";
    }

    // Close the database connection
    mysqli_close($conn);
}


?>
