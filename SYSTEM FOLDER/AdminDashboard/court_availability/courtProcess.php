<?php

include "courtFunction.php";
if(isset($_POST['addCourtButton'])){
    //we are here rn
    addNewCourt();
    header('Location:courtList.php');
}
elseif(isset($_POST['courtIdToDelete'])){
    deleteCourt();
    header('Location:courtList.php');
}
elseif(isset($_POST['updateCourtButton'])){
    updateCourt();
    header('Location:courtList.php');
}
?>