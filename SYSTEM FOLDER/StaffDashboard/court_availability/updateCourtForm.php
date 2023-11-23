<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
include "courtFunction.php";

$courtid = $_POST['courtIdToUpdate'];
$courtReference = $_POST['courtReferenceToUpdate'];
$courtQry = getCourtInformation($courtid);

$courtInfo = mysqli_fetch_assoc($courtQry);
$courtName = $courtInfo['courtName'];
$date = $courtInfo['date'];
$time = $courtInfo['start_time'];
$end_time = $courtInfo['end_time'];
$courtStatus = $courtInfo['status'];
?>
<div class="container mt-5">
    <h2 class="text-center">Update Court Information</h2>
    <form action="courtProcess.php" method="POST">
    <div class="form-group">
            <label for="updateCourtReference">Booking Reference</label>
            <input type="text" class="form-control" name="courtReference" value="<?php echo $courtReference; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="updateCourtId">Court ID</label>
            <input type="text" class="form-control" name="courtid" value="<?php echo $courtid; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="updateCourtName">Court Name</label>
            <input type="text" class="form-control" name="courtName" value="<?php echo $courtName; ?>" placeholder="Enter Court Name">
        </div>

        <div class="form-group">
            <label for="updateDate">Date</label>
            <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
        </div>

        <div class="form-group">
            <label for="updateTime">Time</label>
            <input type="time" class="form-control" name="time" value="<?php echo $time; ?>">
        </div>

        <div class="form-group">
            <label for="updateEndTime">End Time</label>
            <input type="time" class="form-control" name="end_time" value="<?php echo $end_time; ?>">
        </div>

        <div class="form-group">
            <label for="inputCourtStatus">Status</label>
            <select name="courtStatus" id="courtStatus" class="form-control">
                <option value="booked" <?php echo ($courtStatus == "booked") ? 'selected' : ''; ?>>booked</option>
                <option value="using" <?php echo ($courtStatus == "using") ? 'selected' : ''; ?>>using</option>
                <option value="passed" <?php echo ($courtStatus == "passed") ? 'selected' : ''; ?>>passed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="updateCourtButton" value="Update">Update</button>
    </form>
    <a href="courtList.php" class="mt-3 btn btn-secondary">Back to Court Availability</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
