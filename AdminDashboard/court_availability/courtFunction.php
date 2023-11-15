<?php

function addNewCourt() {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $courtid = $_POST['courtid'];
        $courtName = $_POST['courtName'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $status = $_POST['status'];

        $sql = "INSERT INTO booking (courtID, courtName, name, email, date, start_time, end_time, status)
        VALUES ('$courtid', '$courtName', '$name', '$email', '$date', '$time', '$end_time', '$status')";

        if (mysqli_query($con, $sql)) {
            echo "Record added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    mysqli_close($con);
}


function getCourtInformation($courtListQry){
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql = "SELECT booking.*, court.courtID FROM booking
        LEFT JOIN court ON booking.courtID = court.courtID
        WHERE booking.courtID = '" . $courtListQry . "'";
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function getListOfCourt(){
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql = "SELECT booking.*, court.courtID FROM booking
        LEFT JOIN court ON booking.courtID = court.courtID";

        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function deleteCourt(){
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the booking reference to delete from the POST data
    $bookingReferenceToDelete = $_POST['bookingReferenceToDelete'];

    // Use a prepared statement to prevent SQL injection
    $sql = "DELETE FROM booking WHERE booking_reference=?";
    
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $bookingReferenceToDelete);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Delete was successful
        return true;
    } else {
        // Delete failed
        return false;
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

function updateCourt(){
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $bookingReference = $_POST['courtReference'];
        $courtID = $_POST['courtid'];
        $courtName = $_POST['courtName'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $end_time = $_POST['end_time'];
        $courtStatus = $_POST['courtStatus'];
        
        $sql = "UPDATE booking SET courtName='$courtName', date='$date', start_time='$time', end_time='$end_time', status='$courtStatus' WHERE booking_reference='$bookingReference' AND courtID='$courtID'";


        $qry = mysqli_query($con, $sql);

        // Check if the query was successful
        if ($qry) {
            // The update was successful
            return true;
        } else {
            // The update failed
            return false;
        }
    }
}


?>


