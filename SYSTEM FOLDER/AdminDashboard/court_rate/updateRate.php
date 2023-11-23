<?php
include "rateFunction.php";

// Get the unique id to identify the record you want to update
$idToUpdate = $_POST['idToUpdate'];

// Fetch the rate information based on the id
$rateInfo = getCourtRate($idToUpdate);

if ($rateInfo) {
    $rate = mysqli_fetch_assoc($rateInfo);
} else {
    // Handle the case where no data was found
    echo "Record not found or an error occurred.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Update Court Rate</h2>

        <form action="rateProcess.php" method="POST" class="mt-4">
            <input type="hidden" name="idToUpdate" value="<?php echo $idToUpdate; ?>">

            <div class="form-group">
                <label for="rateH">Rate (RM)/ Per Hour:</label>
                <input type="text" id="rateH" name="rateH" class="form-control">
            </div>

            <div class="form-group">
                <label for="rateM">Rate (RM)/ Per Minute:</label>
                <input type="text" id="rateM" name="rateM" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="updateRateButton">Update Rate</button>
        </form>

        <a href="rateList.php" class="mt-3 btn btn-secondary">Back to Court Rates</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
