<?php

include "rateFunction.php";


    $dayOfWeek = $_POST['dayOfWeekToUpdate'];

    
    $rateInfo = getCourtRate($dayOfWeek);
    $rate = mysqli_fetch_assoc($rateInfo);

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
            <input type="hidden" name="dayOfWeek" value="<?php echo $dayOfWeek; ?>">

            <div class="form-group">
                <label for="rate">Rate (RM):</label>
                <input type="text" id="rate" name="rate" class="form-control" value="<?php echo $rate['rate']; ?>">
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
