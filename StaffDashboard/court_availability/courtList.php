<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pro Badminton Centre - Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                    <h1 class="h3 mb-4 text-gray-800">Court List</h1>
                    <!-- Rest of your content from rateList.php goes here -->

                    <?php
include "courtFunction.php";
//display table header

echo '<div >';

if(isset($_POST['searchByRegButton'])){
    $courtListQry = getCourtInformation($_POST['searchValue']);
}
else
    $courtListQry =  getListOfCourt();

echo 'There are '.mysqli_num_rows($courtListQry).' record';

echo '<table class="custom-table">';
echo '<tr>';
echo '<th>No.</th>';
echo '<th>Court ID</th>';
echo '<th>Court Name</th>';
echo '<th>Username</th>';
echo '<th>Email</th>';
echo '<th>Date</th>';
echo '<th>Time</th>';
echo '<th>End Time</th>';
echo '<th>Status</th>';
echo '<th>Update</th>';

echo '</tr>';

//display each field
$count = 1;
while ($row = mysqli_fetch_assoc($courtListQry)) {
    $courtid = $row['courtID'];
    echo '<tr>';
    echo '<td>' . $count . '</td>';
    echo '<td>' . $row['courtID'] . '</td>';
    echo '<td>' . $row['courtName'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['time'] . '</td>';
    echo '<td>' . $row['end_time'] . '</td>';
    echo '<td>' . $row['status'] . '</td>';
    // Update
    echo '<td style="white-space: nowrap;">';
    echo "<form action='updateCourtForm.php' method='POST'>";
    echo "<input type='hidden' value='$courtid' name='courtIdToUpdate'>";
    echo "<button type='submit' name='updateCourtButton' class='btn btn-success'>Update</button>";
    echo "</form>";
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

<!-- JavaScript to handle the Add button click -->
<script>
    function redirectToCourtAvailabilityForm() {
        window.location.href = 'courtAvailabilityForm.php';
    }
</script>

<!-- Add button -->
<button onclick="redirectToCourtAvailabilityForm()"  class="btn btn-primary">Add New</button>

<!-- Delete button -->
<button id="deleteButton" class="btn btn-danger ml-2" data-toggle="modal" data-target="#deleteModal">Delete</button>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteForm">
                    <div class="form-group">
                        <label for="courtID">Court ID:</label>
                        <input type="text" class="form-control" id="courtID" name="courtID">
                    </div>
                    <div class="form-group">
                        <label for="usernameOrEmail">Username or Email:</label>
                        <input type="text" class="form-control" id="usernameOrEmail" name="usernameOrEmail">
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="time">Starting Time:</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle the delete action
    document.getElementById("confirmDeleteButton").addEventListener("click", function () {
        // Get input values
        var courtID = document.getElementById("courtID").value;
        var usernameOrEmail = document.getElementById("usernameOrEmail").value;
        var date = document.getElementById("date").value;
        var time = document.getElementById("time").value;

        // Create a data object with the input values
        var data = {
            courtID: courtID,
            usernameOrEmail: usernameOrEmail,
            date: date,
            time: time
        };

        // Send the AJAX request to deleteCourt.php
        $.ajax({
            type: "POST",
            url: "deleteCourt.php",
            data: data,
            success: function (response) {
                // Handle the response from the server (e.g., show a success message)
                alert(response);
                // Close the modal
                $('#deleteModal').modal('hide');
            },
            error: function (error) {
                // Handle errors (e.g., display an error message)
                console.error(error);
            }
        });
    });
</script>


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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
