<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php

include "courtFunction.php";
//display table header

echo '<div class="w3-container">';

displaySearchOption();
addOption();

if(isset($_POST['searchByRegButton'])){
    $courtListQry = getCourtInformation($_POST['searchValue']);
}
else
    $courtListQry =  getListOfCourt();

if(isset($_POST['AddButton'])){
    header('Location:courtAvailabilityForm.php');
}

echo 'There are '.mysqli_num_rows($courtListQry).' record';

echo '<table class="w3-table w3-striped">';
    echo '<tr>';
        echo '<th>No.</th>';
        echo '<th>Court ID</th>';
        echo '<th>Court Name</th>';
        echo '<th>Court Status</th>';
    echo '</tr>';

//display each field
    $count=1;
while($row=mysqli_fetch_assoc($courtListQry))
{
    $courtid = $row['courtID'];
    echo '<tr>';
        echo '<td>'.$count.'</td>';
        echo '<td>'.$row['courtID'].'</td>';
        echo '<td>'.$row['courtName'].'</td>';
        echo '<td>'.$row['courtStatus'].'</td>';
        //display delete form
        echo '<td>';
            echo "<form action='courtProcess.php' method='POST'>";
                echo "<input type='hidden' value='$courtid'   name='courtIdToDelete'>";
                echo "<input type='submit' value='Delete'     name='deleteCourtButton'>";
            echo  "</form>";
        echo '</td>';
        //update
        echo '<td>';
            echo "<form action='updateCourtForm.php' method='POST'>";
                echo "<input type='hidden' value='$courtid'  name='courtIdToUpdate'>";
                echo "<input type='submit' value='Update'     name='updateCourtButton'>";
            echo  "</form>";
        echo '</td>';

    echo '</tr>';
    $count++;
}
echo '</table>';

 echo '<br>';
 echo '<br>';
 echo '<br>';
 echo '<br>';
	echo '</form>';

?>

<?php

function displaySearchOption(){
    echo '<form action="" method="POST">';
        echo '<input type="text"                             name="searchValue">';
        echo '<input type="submit" value="Search by reg num" name="searchByRegButton">';
        echo '<input type="submit" value="Display All"       name="displayAllButton">';
    echo '</form>';
}
?>

<?php

function addOption(){
    echo '<form action="" method="POST">';
       // echo '<input type="text"             name="searchValue">';
        echo '<input type="submit" value="Add" name="AddButton">';
    echo '</form>';
}
?>

</html>
