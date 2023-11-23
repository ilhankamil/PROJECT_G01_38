<?php
$conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['date']) && isset($_POST['court'])) {
    $selectedDate = mysqli_real_escape_string($conn, $_POST['date']);
    $selectedCourt = mysqli_real_escape_string($conn, $_POST['court']);

    $sql = "SELECT booking_reference, name, email, phonenumber, day, date, start_time, end_time, hours, price, status FROM booking WHERE courtID = '$selectedCourt' AND date = '$selectedDate'";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['booking_reference'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phonenumber'] . "</td>";
            echo "<td>" . $row['day'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['start_time'] . "</td>";
            echo "<td>" . $row['end_time'] . "</td>";
            echo "<td>" . $row['hours'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo '<td>';
            echo '<a href="EditCourtBooking.php?id=' . $row['booking_reference'] . '"><i class="fas fa-pen fa-lg action-icons"></i></a>';
            echo '<a href="CancelCourtBooking.php?id=' . $row['booking_reference'] . '"><i class="fas fa-times fa-lg action-icons"></i></a>';
            echo '</td>';
            echo "</tr>";
        }
    } else {
        echo "No data found for the selected date and court.";
    }
}
mysqli_close($conn);
?>
