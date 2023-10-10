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
                    <h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>
                    <!-- Rest of your content from rateList.php goes here -->

<?php
include "courtFunction.php";
//display table header

echo '<div class="w3-container">';

displaySearchOption();

if(isset($_POST['searchByRegButton'])){
    $courtListQry = getCourtInformation($_POST['searchValue']);
}
else
    $courtListQry =  getListOfCourt();

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
                echo "<input type='hidden' value='$courtid'   name='courtIdToDelete' style='background-color:#577EFF; color: white;'>";
                echo "<input type='submit' value='Delete'     name='deleteCourtButton'>";
            echo  "</form>";
        echo '</td>';
        //update
        echo '<td>';
            echo "<form action='updateCourtForm.php' method='POST'>";
                echo "<input type='hidden' value='$courtid'  name='courtIdToUpdate' style='background-color:#577EFF; color: white;'>";
                echo "<input type='submit' value='Update'    name='updateCourtButton'>";
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

<!-- JavaScript to handle the Add button click -->
<script>
    function redirectToCourtAvailabilityForm() {
        window.location.href = 'courtAvailabilityForm.php';
    }
</script>

<!-- Add button -->
<button onclick="redirectToCourtAvailabilityForm()" style="">Add</button>


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
</body>