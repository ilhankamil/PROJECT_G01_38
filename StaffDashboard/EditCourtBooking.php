<?php
if (isset($_GET['id'])) {
    // Retrieve the ID parameter from the URL
    $bookingReference = $_GET['id'];
    
    // Connect to the database
    $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM booking WHERE booking_reference = '$bookingReference'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Data retrieval is done, but keep the connection open
    } else {
        die("Booking record not found.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form data when submitted
    // Retrieve and sanitize the form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $day = mysqli_real_escape_string($conn, $_POST['day']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($conn, $_POST['end_time']);
    $hours = mysqli_real_escape_string($conn, $_POST['hours']);
    $courtID = mysqli_real_escape_string($conn, $_POST['courtID']);
    $courtName = mysqli_real_escape_string($conn, $_POST['courtName']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Perform the database update
    $updateSQL = "UPDATE booking SET 
                  name = '$name', 
                  email = '$email', 
                  phonenumber = '$phonenumber', 
                  day = '$day', 
                  date = '$date', 
                  start_time = '$start_time', 
                  end_time = '$end_time', 
                  hours = '$hours', 
                  courtID = '$courtID', 
                  courtName = '$courtName', 
                  price = '$price', 
                  status = '$status' 
                  WHERE booking_reference = '$bookingReference'";
    
    if (mysqli_query($conn, $updateSQL)) {
        // Redirect to a success page or another location
        header("Location: CourtBooking.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection after processing the form data
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
    <!-- Add Bootstrap CSS link here -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Booking</h2>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>

            <div class="form-group">
                <label for="phonenumber">Phone Number:</label>
                <input type="text" class="form-control" name="phonenumber" value="<?php echo $row['phonenumber']; ?>">
            </div>

            <div class="form-group">
                <label for="day">Day:</label>
                <input type="text" class="form-control" name="day" value="<?php echo $row['day']; ?>">
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>">
            </div>

            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" class="form-control" name="start_time" value="<?php echo $row['start_time']; ?>">
            </div>

            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="time" class="form-control" name="end_time" value="<?php echo $row['end_time']; ?>">
            </div>

            <div class="form-group">
                <label for="hours">Hours:</label>
                <input type="text" class="form-control" name="hours" value="<?php echo $row['hours']; ?>">
            </div>

            <div class="form-group">
                <label for="courtID">Court ID:</label>
                <input type="text" class="form-control" name="courtID" value="<?php echo $row['courtID']; ?>">
            </div>

            <div class="form-group">
                <label for="courtName">Court Name:</label>
                <input type="text" class="form-control" name="courtName" value="<?php echo $row['courtName']; ?>">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    
    <!-- Add Bootstrap JS and jQuery links here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
