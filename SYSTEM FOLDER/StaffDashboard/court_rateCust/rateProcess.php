<?php

include "rateFunction.php";

if(isset($_POST['addCourtRateButton'])){
    addNewCourtRate();
    header('Location:rateList.php');
}
elseif(isset($_POST['deleteCourtRateButton'])){
    deleteCourtRate();
    header('Location:rateList.php');
}
elseif(isset($_POST['updateRateButton'])){
    updateCourtRate();
    header('Location:rateList.php');
}
?>