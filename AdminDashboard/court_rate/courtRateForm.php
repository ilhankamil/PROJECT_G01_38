<!DOCTYPE html>
<html lang="en">
<head>
    <title>Court Rate Form</title>
</head>
<body>
    <h3>Add Court Rate</h3>
    <form action="rateProcess.php" method="POST">
        Day of Week: <input type="text" name="dayOfWeek"><br>
        Rate (RM): <input type="number" step="0.01" name="rate"><br>

        <input type="submit" value="Add" name="addCourtRateButton">
    </form>
</body>
</html>
