<?php

function addNewCourtRate() {
    // Establish a connection to the database
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // Get data from POST
        $dayOfWeek = $_POST['dayOfWeek'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $priceHour = $_POST['priceHour'];
        $priceMinutes = $_POST['priceMinutes'];

        // Sanitize the input to prevent SQL injection
        $dayOfWeek = mysqli_real_escape_string($con, $dayOfWeek);
        $startTime = mysqli_real_escape_string($con, $startTime);
        $endTime = mysqli_real_escape_string($con, $endTime);
        $priceHour = mysqli_real_escape_string($con, $priceHour);
        $priceMinutes = mysqli_real_escape_string($con, $priceMinutes);

        // Use prepared statements to safely insert data
        $sql = "INSERT INTO court_rate (day_of_week, start_time, end_time, price, price_Minutes) VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssss", $dayOfWeek, $startTime, $endTime, $priceHour, $priceMinutes);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Check for successful insertion
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Record added successfully.";
            } else {
                echo "Failed to add the record.";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Failed to prepare the statement.";
        }
    }
}

function getCourtRate($dayOfWeek) {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $dayOfWeek = mysqli_real_escape_string($con, $dayOfWeek);

        $sql = "SELECT * FROM court_rate WHERE day_of_week = '$dayOfWeek'";
        $qry = mysqli_query($con, $sql);

        if (!$qry) {
            die("Query failed: " . mysqli_error($con));
        }

        return $qry;
    }
}

function getListOfCourtRates() {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $sql = "SELECT * FROM court_rate";
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function deleteCourtRate() {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the idToDelete from POST data
    $idToDelete = $_POST['idToDelete'];

    // Use this value to delete the specific row
    $sql = "DELETE FROM court_rate WHERE id = $idToDelete";
    mysqli_query($con, $sql);
}

function updateCourtRate() {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $idToUpdate = $_POST['idToUpdate'];
        $rateH = $_POST['rateH'];
        $rateM = $_POST['rateM'];
        
        // Use commas to separate the columns to be updated
        $sql = "UPDATE court_rate SET price = '$rateH', price_minutes = '$rateM' WHERE id = '$idToUpdate'";
        mysqli_query($con, $sql);
    }
}

?>
