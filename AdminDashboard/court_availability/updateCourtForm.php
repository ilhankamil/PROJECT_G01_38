<?php

include "courtFunction.php";
//print_r($_POST);

$courtid=$_POST['courtIdToUpdate'];

$courtQry = getCourtInformation($courtid);
echo "No. of record:".mysqli_num_rows($courtQry);
$courtInfo=mysqli_fetch_assoc($courtQry);
$courtName=$courtInfo['courtName'];
$courtStatus=$courtInfo['courtStatus'];

echo '<form action="courtFunction.php" method="POST">';
    echo" Court ID: <input type='text' name='courtid' value='$courtid' readonly>";
    echo"<br>Court Name: <input type='text' name='courtName' value='$courtName'>";
    echo "<select name='courtStatus'>";
        echo "<option value='$courtStatus'>Available</option>";
        echo "<option value='$courtStatus'>Booked</option>";
        echo "</select>";

    echo '<input type="submit" name="saveCourtButton" value="save">';


echo '</form>';

?>
