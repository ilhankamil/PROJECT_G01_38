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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container">
        <h2>Update Court Rate</h2>

        <form action="rateProcess.php" method="POST">

            <input type="hidden" name="dayOfWeek" value="<?php echo $dayOfWeek; ?>">

            <label for="rate">Rate (RM):</label>
            <input type="text" id="rate" name="rate" value="<?php echo $rate['rate']; ?>"><br><br>

            <input type="submit" name="updateRateButton" value="Update Rate">
        </form>

        <br><br>
        <a href="rateList.php">Back to Court Rates</a> 
    </div>
</body>
</html>
