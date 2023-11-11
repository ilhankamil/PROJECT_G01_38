<?php
session_start()
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pro One Badminton Center</title>
    <link rel="stylesheet" href="css/common.css">
    <?php require('inc/links.php'); ?>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>


<body class="bg-light">
    <!-- Include header.php -->
    <?php include "inc/header.php"; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
              <!-- Begin Page Content -->
            <div class="container-fluid">
            <?php
            include "dbconnect.php";
            include "bookingfunctions.php";
            
            $username = $_SESSION['uname_or_email'];

            $qryActiveAndFutureList = getListOfFutureBookingByCustomer($username);
            $qryPastBooking = getListOfPastBookingByCustomer($username);
        ?>
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="true">Active/Future Booking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed Booking</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="active-tab">
                <?php showBookingList($qryActiveAndFutureList, "Active/Future Booking"); ?>
            </div>
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <?php showBookingList($qryPastBooking, "Completed Booking"); ?>
            </div>
        </div>

            </div>
        </div>
    </div>

     <!-- Logout Modal-->
  <?php include "inc/logoutmodal.php"; ?>
   

   <!-- Bootstrap core JavaScript-->
   <!-- Core plugin JavaScript-->
   <!-- Custom scripts for all pages-->
   <?php include "inc/assets.php"; ?>

</body>
