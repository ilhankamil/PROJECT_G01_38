<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php
    include "rateFunction.php";

    echo '<div class="w3-container">';

    if(isset($_POST['searchByDayButton'])){
        $dayOfWeek = $_POST['searchValue'];
        $courtRateListQry = getCourtRate($dayOfWeek);
    }
    else {
        $courtRateListQry = getListOfCourtRates();
    }

    if(isset($_POST['AddButton'])){
        header('Location: courtRateForm.php');
    }

    echo 'There are '.mysqli_num_rows($courtRateListQry).' records';

    echo '<table class="w3-table w3-striped">';
    echo '<tr>';
    echo '<th>No.</th>';
    echo '<th>Day of Week</th>';
    echo '<th>Rate (RM)</th>';
    echo '<th>Delete</th>';
    echo '<th>Update</th>';
    echo '</tr>';

    $count = 1;
    while($row = mysqli_fetch_assoc($courtRateListQry)) {
        $dayOfWeek = $row['dayOfWeek'];
        echo '<tr>';
        echo '<td>'.$count.'</td>';
        echo '<td>'.$dayOfWeek.'</td>';
        echo '<td>'.$row['rate'].'</td>';
        // Display delete form
        echo '<td>';
        echo '<form action="rateProcess.php" method="POST">';
        echo '<input type="hidden" value="'.$dayOfWeek.'" name="dayOfWeekToDelete">';
        echo '<input type="submit" value="Delete" name="deleteCourtRateButton">';
        echo '</form>';
        echo '</td>';
        // Update
        echo '<td>';
        echo '<form action="updateRate.php" method="POST">';
        echo '<input type="hidden" value="'.$dayOfWeek.'" name="dayOfWeekToUpdate">';
        echo '<input type="submit" value="Update" name="updateCourtRateButton">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        $count++;
    }

    echo '</table>';
    echo '<br>';
    echo '<br>';
    echo '<br>';

    addOption();
    echo '<br>';

    echo '<form action="logout.php" method="post">';
    echo '<input type="submit" value="Logout">';
    echo '</form>';
    ?>

    <?php
    function addOption(){
        echo '<form action="" method="POST">';
        echo '<input type="submit" value="Add" name="AddButton">';
        echo '</form>';
    }
    ?>
</div>
</body>
</html>
