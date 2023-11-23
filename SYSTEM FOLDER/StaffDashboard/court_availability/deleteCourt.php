<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $courtID = $_POST['courtID'];
    $usernameOrEmail = $_POST['usernameOrEmail'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $con = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM booking WHERE courtID = '$courtID' AND (name = '$usernameOrEmail' OR email = '$usernameOrEmail') AND date = '$date' AND start_time = '$time'";

    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Record not found";
    }

    mysqli_close($con);
}
?>
