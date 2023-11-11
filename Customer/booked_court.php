<?php
session_start();
include "dbconnect.php";

$username = $_SESSION['uname_or_email'];

if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
    // It's an email, so assign it to $email
    $email = $username;

    /*
    print_r($_GET);
    echo "<br>"; */

    
    $courtID = $_GET['courtID'];
    $courtName = $_GET['courtName'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $hours = $_GET['hours'];
    $status = 'booked';
    $booking_reference = generateUniqueID();
    
    
    // Calculate the day of the week (1 for Monday, 2 for Tuesday, etc.)
    $dayOfWeek = date('N', strtotime($date));

    // Translate $dayOfWeek tothe day of the week (1 for Monday, 2 for Tuesday, etc.)
    $dayName = translateDayOfWeek($dayOfWeek);

    // Get the time in 'H:i:s' format
    $startTime = date('H:i:s', strtotime($time));


    // Calculate end_time
    $endTimeStamp = strtotime($startTime) + ($hours * 3600); // Add the number of hours in seconds
    $endTime = date('H:i:s', $endTimeStamp);
  //  $endTime = adjustTime($endTimeStamp, $endTimeCo);

   // echo "End Time<br>:".$endTime;
    

    // Calculate the price based on the day of the week, time, and hours selected
    $price = calculatePrice($conn, $startTime, $endTime, $hours, $dayOfWeek);

    /* Debugging output
    echo "<br>";
    echo "Day of the week: $dayOfWeek<br>";
    echo "Booking time: $startTime<br>";
    echo "Start time: $time<br>";
    echo "End time: $endTime<br>";
    echo "Day: $dayName<br>";
    echo "Date: $date<br>";
    echo "Hours: $hours<br>";
    echo "Court: $courtName<br>";
    echo "Calculated price: $price<br>"; */
    
    $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");
    
    $sql = "SELECT phonenumber, username FROM customer WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_array($result)) {
        $phonenumber = $row["phonenumber"];
        $userEmail = $row["username"];
    }
    

    $sql = "INSERT INTO booking (booking_reference, name, email, phonenumber, day, date, start_time, end_time, hours, courtName, price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $booking_reference, $userEmail, $email, $phonenumber, $dayName, $date, $startTime, $endTime, $hours, $courtName, $price, $status);

    if ($stmt->execute()) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $stmt->error;
    }


} else {
    // It's a username, so assign it to $username
    $username = $username;
    
 /*
    print_r($_GET);
    echo "<br>"; */

    $courtID = $_GET['courtID'];
    $courtName = $_GET['courtName'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $hours = $_GET['hours'];
    $status = 'booked';
    $booking_reference = generateUniqueID();

    // Calculate the day of the week (1 for Monday, 2 for Tuesday, etc.)
    $dayOfWeek = date('N', strtotime($date));

    // Translate $dayOfWeek tothe day of the week (1 for Monday, 2 for Tuesday, etc.)
    $dayName = translateDayOfWeek($dayOfWeek);

    // Get the time in 'H:i:s' format
    $startTime = date('H:i:s', strtotime($time));

     // Calculate end_time
     $endTimeStamp = strtotime($startTime) + ($hours * 3600); // Add the number of hours in seconds
     $endTime = date('H:i:s', $endTimeStamp);
    // $endTime = adjustTime($endTimeStamp, $endTimeCo);
 
     echo "End Time:".$endTime."<br>";

    // Calculate the price based on the day of the week, time, and hours selected
    $price = calculatePrice($conn, $startTime, $endTime, $hours, $dayOfWeek);


    /* Debugging output
    echo "<br>";
    echo "Day of the week: $dayOfWeek<br>";
    echo "Booking time: $startTime<br>";
    echo "Start time: $time<br>";
    echo "End time: $endTime<br>";
    echo "Day: $dayName<br>";
    echo "Date: $date<br>";
    echo "Hours: $hours<br>";
    echo "Court: $courtName<br>";
    echo "Calculated price: $price<br>"; */

    $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

    $sql = "SELECT phonenumber FROM customer WHERE username = '" . $username . "'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_array($result)) {
    $phonenumber = $row["phonenumber"];
    $emailUser = $row["email"];
        }

        $sql = "INSERT INTO booking (booking_reference, name, email phonenumber, day, date, start_time, end_time, hours, courtName, price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssss", $booking_reference, $username, $emailUser, $phonenumber, $dayName, $date, $startTime, $endTime, $hours, $courtName, $price, $status);


        
    if ($stmt->execute()) {
        echo "Booking successful!";
    }else {
        echo "Error: " . $stmt->error;
        }

}
?>


<?php

function generateUniqueID()
{
    $timestamp = time();
    $randomNumber = mt_rand(1000, 9999);
    $uniqueID = $timestamp . $randomNumber;
    return $uniqueID;
}

function translateDayOfWeek($dayOfWeek) {
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    
    // Ensure the input is within a valid range
    if ($dayOfWeek >= 1 && $dayOfWeek <= 7) {
        return $days[$dayOfWeek - 1]; // Subtract 1 because array is 0-indexed
    } else {
        return 'Invalid Day';
    }
}

/*
function adjustTime($endTimeStamp, $endTimeCo) {
    $hours = floor($endTimeStamp / 3600);  // Calculate the hours part
    $minutes = floor(($endTimeStamp % 3600) / 60);  // Calculate the minutes part
    $seconds = $endTimeStamp % 60;  // Calculate the seconds part

    if ($hours >= 24) {
        // If the hours exceed 23, adjust the date and reset the hours to 0
        $dateAdjustment = floor($hours / 24);
        $hours %= 24;
        // You can add the date adjustment to the date here if needed
        // For example, increment the date by $dateAdjustment days.
    }

    // Format the adjusted time as HH:MM:SS
    $adjustedTime = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

    return $adjustedTime;
}
*/

function calculatePrice($conn, $startTime, $endTime, $hours, $dayOfWeek) {
    // Initialize the total price
    $totalPrice = 0;

    // SQL query to fetch the relevant price data from the court_rate table
    // $sql = "SELECT price, price_minutes FROM court_rate WHERE '$startTime' >= start_time AND end_time >= '$endTime' AND day_of_week = '$dayOfWeek'";
    // $sql = "SELECT price, price_minutes, start_time, end_time FROM court_rate WHERE day_of_week = '$dayOfWeek' AND ('$startTime' <= end_time AND '$endTime' >= start_time)";
    $sql = "SELECT price, price_minutes, start_time, end_time FROM court_rate WHERE day_of_week = '$dayOfWeek' AND ('$startTime' <= end_time AND '$endTime' >= start_time)";
    $result = mysqli_query($conn, $sql);

    //echo "Debug SQL Query: " . $sql . "<br>";

    // Loop through the results and calculate the total price
    while ($row = $result->fetch_assoc()) {
        $price = $row['price'];
        $pricePerMin = $row['price_minutes'];
        $slotStartTime = new DateTime($row['start_time']);
        $slotEndTime = new DateTime($row['end_time']);

        // Calculate the overlap between the user input and the time slot
        $overlapStart = max(new DateTime($startTime), $slotStartTime);
        $overlapEnd = min(new DateTime($endTime), $slotEndTime);

        // Calculate the hours and minutes for the overlap
        $overlapHours = $overlapStart->diff($overlapEnd)->h;
        $overlapMinutes = $overlapStart->diff($overlapEnd)->i;

        // Calculate the price for the overlap
        $timeSlotPrice = ($price * $overlapHours) + ($pricePerMin * $overlapMinutes);

        // Add this time slot's price to the total
        $totalPrice += $timeSlotPrice;
    }
echo "Total Price:".$totalPrice;
    return $totalPrice;
}
?>
