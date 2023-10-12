<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pro Badminton Centre - Court Rate</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Add this CSS code to the head of your HTML document -->
    <style>
        /* Style for the table */
        table.custom-table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #e5e5e5; /* Define the outline color */
        }

        /* Style for table header (th) */
        table.custom-table th {
            background-color: #f2f2f2; /* Define header background color */
            border: 1px solid #e5e5e5;
            text-align: left;
            padding: 8px;
        }

        /* Style for table cells (td) */
        table.custom-table td {
            border: 1px solid #e5e5e5;
            text-align: left;
            padding: 8px;
        }

        /* Style for table rows */
        table.custom-table tr:nth-child(even) {
            background-color: #f2f2f2; /* Define even row background color */
        }
        
    </style>

</head>
<body id="page-top">
     <!-- Page Wrapper -->
     <div id="wrapper">
    
       <!-- Include sidebar.php -->
       <?php include "inc/sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

            <!-- Include header.php -->
        <?php include "inc/header.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Court Rate</h1>
                    <!-- Rest of your content from rateList.php goes here -->

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

echo 'There are '.mysqli_num_rows($courtRateListQry).' records';

echo '<table class="custom-table">';
echo '<tr>';
echo '<th>No.</th>';
echo '<th>Day of Week</th>';
echo '<th>Rate (RM)</th>';
echo '<th>Update</th>';
echo '<th>Delete</th>';
echo '</tr>';

$count = 1;
while($row = mysqli_fetch_assoc($courtRateListQry)) {
    $dayOfWeek = $row['dayOfWeek'];
    echo '<tr>';
    echo '<td>'.$count.'</td>';
    echo '<td>'.$dayOfWeek.'</td>';
    echo '<td>'.$row['rate'].'</td>';
    // Update
    echo '<td style="white-space: nowrap;">';
    echo '<form action="updateRate.php" method="POST">';
    echo '<input type="hidden" value="'.$dayOfWeek.'" name="dayOfWeekToUpdate">';
    echo '<button type="submit" name="updateCourtRateButton" class="btn btn-success">Update</button>';
    echo '</form>';
    echo '</td>';
    // Display delete form
    echo '<td style="white-space: nowrap;">';
    echo '<form action="rateProcess.php" method="POST">';
    echo '<input type="hidden" value="'.$dayOfWeek.'" name="dayOfWeekToDelete">';
    echo '<button type="submit" name="deleteCourtRateButton" class="btn btn-danger">Delete</button>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    $count++;
}

echo '</table>';
echo '<br>';
echo '<br>';
echo '<br>';
?>

<!-- JavaScript to handle the Add button click -->
<script>
    function redirectToCourtRateForm() {
        window.location.href = 'courtRateForm.php';
    }
</script>

<!-- Add button -->
<button onclick="redirectToCourtRateForm()" class="btn btn-primary">Add New</button>


<?php
function addOption(){
    echo '<form action="" method="POST">';
    echo '<input type="submit" value="Add" name="AddButton">';
    echo '</form>';
}
?>

                  
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            
        </div>
        <!-- End of Content Wrapper -->

        <!-- Include footer.php -->
        <?php include "inc/footer.php"; ?>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include "inc/logoutmodal.php"; ?>
   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</div>
</body>
</html>
