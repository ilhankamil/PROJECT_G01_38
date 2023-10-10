<!DOCTYPE html>
<html lang="en">
<head>
    <title>Court Avalability Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php

include "courtFunction.php";
//print_r($_POST);

$courtid=$_POST['courtIdToUpdate'];

$courtQry = getCourtInformation($courtid);
echo "No. of record:".mysqli_num_rows($courtQry);
$courtInfo=mysqli_fetch_assoc($courtQry);
$courtName=$courtInfo['courtName'];
$courtStatus=$courtInfo['courtStatus'];

/*echo '<form action="courtFunction.php" method="POST">';
    echo" Court ID: <input type='text' name='courtid' value='$courtid' readonly>";
    echo"<br>Court Name: <input type='text' name='courtName' value='$courtName'>";
    echo "<select name='courtStatus'>";
        echo "<option value='$courtStatus'>Available</option>";
        echo "<option value='$courtStatus'>Booked</option>";
        echo "</select>";

    echo '<input type="submit" name="saveCourtButton" value="save">';


echo '</form>';*/



echo '<div class="container">';
echo'<div class="row">';
echo'<div class="col">';
echo'<form action="courtFunction.php" method="POST">';

echo'<label for="updateCourtId">Court ID</label>';
echo"<input type='text' class='form-control' name='courtid' value='$courtid' placeholder='Enter Court ID' readonly>";


echo'<label for="updateCourtName">Court Name</label>';
echo"<input type='text' class='form-control' name='courtName' value='$courtName' placeholder='Enter Court name'>";

echo'<label for="inputCourtStatus">Status</label>';
echo"<select name='courtStatus' id='courtStatus' class='form-control'>";
echo'<option value="$courtStatus">Available</option>';
echo'<option value="$courtStatus">Booked</option>';
echo'</select><br>';

        echo'<div class="mx-auto" style="width: 200px;">';
        echo"<button type='submit' class='btn btn-primary' name='saveCourtButton' value='save'>Submit</button>";
        echo'</div>';

?>
</body>
</html>
