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
        $time = $_POST['time'];
        $end_time = $_POST['end_time'];
        $status = $_POST['status'];

        $sql = "INSERT INTO court_availability (courtID, courtName, name, email, date, time, end_time, status)
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
        $sql = "SELECT court_availability.*, court.courtID FROM court_availability
        LEFT JOIN court ON court_availability.courtID = court.courtID
        WHERE court_availability.courtID = '" . $courtListQry . "'";
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
        $sql = "SELECT court_availability.*, court.courtID FROM court_availability
        LEFT JOIN court ON court_availability.courtID = court.courtID";
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function deleteCourt(){
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the courtID to delete from the POST data
    $courtIDToDelete = $_POST['courtIdToDelete'];

    // Use a prepared statement to prevent SQL injection
    $sql = "DELETE FROM court_availability WHERE courtID=?";
    
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $courtIDToDelete);

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
        $courtid = $_POST['courtid'];
        $courtName = $_POST['courtName'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $end_time = $_POST['end_time'];
        $courtStatus = $_POST['courtStatus'];
        
        $sql = "UPDATE court_availability SET courtName='$courtName', date='$date', time='$time', end_time='$end_time', status='$courtStatus' WHERE courtID='$courtid'";
        echo $sql;  // You can remove this line after testing

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


