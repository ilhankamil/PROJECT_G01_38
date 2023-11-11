<?php
// Include your database connection code here

if (isset($_GET['id'])) {
    $bookingReference = $_GET['id'];

     // Check if the form is submitted and 'delete' parameter is set
     if (isset($_POST['delete'])) {
        // Perform the delete operation here
        $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $deleteSQL = "DELETE  FROM booking WHERE booking_reference = '$bookingReference'";

        if (mysqli_query($conn, $deleteSQL)) {
            // Redirect to a success page or another location
            header("Location: CourtBooking.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        // Fetch the booking details only if not confirming deletion
        $conn = mysqli_connect("localhost", "proadmin38", "proadmin38", "proonebadmintoncentre");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM booking WHERE booking_reference = '$bookingReference'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            die("Booking record not found.");
        }

        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cancel Booking</title>
    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
        .form-control {
            width: 20cm; /* Adjust the width as needed */
        }
        .centered-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh; /* Ensure the form is at least full viewport height */
        }
    </style>
</head>
<body>
<div class="centered-form">
    <h2>Cancel Booking</h2>

    <?php if (isset($_GET['id'])) : ?>
    <!-- Display the form -->
    <form method="POST" action="" id="form">
        <!-- Hidden input to pass the booking reference -->
        <input type="hidden" name="booking_reference" value="<?php echo $bookingReference; ?>">
        
        <div class="form-group">
            <label for="booking_reference">Booking Reference</label>
            <input type="text" class="form-control" id="booking_reference" value="<?php echo $bookingReference; ?>" readonly>
        </div>
        <?php if (isset($row)) : ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="court">Court</label>
            <input type="text" class="form-control" id="court" value="<?php echo $row['courtID']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control" id="date" value="<?php echo $row['date']; ?>" readonly>
        </div>
        <!-- Add more fields as needed -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal">Delete</button>
        <button type="button" class="btn btn-secondary" onclick="history.back();">Back</button>


        <?php else : ?>
        <p>Booking details not found.</p>
        <?php endif; ?>
    </form>
    <?php endif; ?>
</div>
    
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="" id="confirmationForm">
                <div class="modal-body">
                    <p>Are you sure you want to delete this booking?</p>
                    <input type="hidden" name="confirm" value="true">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="confirmationForm" class="btn btn-danger" name="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
