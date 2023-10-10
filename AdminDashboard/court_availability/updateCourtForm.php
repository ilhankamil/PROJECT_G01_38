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
$courtQry = getCourtInformation($courtid);

$courtInfo = mysqli_fetch_assoc($courtQry);
$courtName = $courtInfo['courtName'];
$courtStatus = $courtInfo['courtStatus'];
?>
<div class="container mt-5">
    <h2 class="text-center">Update Court Information</h2>
            <form action="courtProcess.php" method="POST">
            <div class="form-group">
                <label for="updateCourtId">Court ID</label>
                <input type="text" class="form-control" name="courtid" value="<?php echo $courtid; ?>" placeholder="Enter Court ID" readonly>
            </div>

            <div class="form-group">
                <label for="updateCourtName">Court Name</label>
                <input type="text" class="form-control" name="courtName" value="<?php echo $courtName; ?>" placeholder="Enter Court name">
            </div>

            <div class="form-group">
                <label for="inputCourtStatus">Status</label>
                <select name="courtStatus" id="courtStatus" class="form-control">
                    <option value="Available" <?php echo ($courtStatus == "Available") ? 'selected' : ''; ?>>Available</option>
                    <option value="Booked" <?php echo ($courtStatus == "Booked") ? 'selected' : ''; ?>>Booked</option>
                </select><br>
            </div>

                    <button type="submit" class="btn btn-primary" name="saveCourtButton" value="save">Submit</button>
            </form>
            <a href="courtList.php" class="mt-3 btn btn-secondary">Back to Court Availability</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
