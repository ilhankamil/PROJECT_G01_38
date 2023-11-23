<?php

function addNewCourtRate(){
    // Establish a connection to the database
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $dayOfWeek = $_POST['dayOfWeek'];
        $rate = $_POST['rate'];

        $sql = "INSERT INTO court_rates (dayOfWeek, rate) VALUES ('$dayOfWeek', '$rate')";
        mysqli_query($con, $sql);
    }
}

function getCourtRate($dayOfWeek) {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $sql = "SELECT * FROM court_rates WHERE dayOfWeek = '$dayOfWeek'";
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function getListOfCourtRates() {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $sql = "SELECT * FROM court_rates";
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function deleteCourtRate() {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo 'in function to delete:'.$_POST['dayOfWeekToDelete'];
    $sql="delete from court_rates where dayOfWeek='".$_POST['dayOfWeekToDelete']."'";
    echo '<br>'.$sql;
    mysqli_query($con,$sql);
}

function updateCourtRate() {
    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        $dayOfWeek = $_POST['dayOfWeek'];
        $rate =  $_POST['rate'];
        $sql = "UPDATE court_rates SET rate = '$rate' WHERE dayOfWeek = '$dayOfWeek'";
        mysqli_query($con, $sql);
    }
}

?>
