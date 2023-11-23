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

    <style>
        /* Style for the table container */
        .table-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #f7f7f7;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 15px;
            border: 1px solid #ddd;
        }

        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Style for table headers */
        th {
            background-color: #333;
            color: #fff;
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        /* Style for table cells */
        td {
            text-align: center;
            border: 1px solid #000;
            padding: 10px;
        }

        /* Add some spacing for better readability */
        .table-container h1 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body class="bg-light">
        <!-- Include header.php -->
        <?php include "inc/header.php"; ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            

            <?php
            include "dbconnect.php";
            $sql = "SELECT * FROM court_rates";
            $result = $conn->query($sql);

            $courtRates = array();

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $courtRates[] = $row;
                }
            }

            ?>
                <br>


                <!-- Begin Page Content -->
 <div class="container-fluid">
        <div class="table-container">
            <h1 class="h3 mb-4 text-gray-800">Court Rates</h1>
            <!-- Display court rates in a table -->
            <table>
                <thead>
                    <tr>
                        <th>Time Slot</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courtRates as $rate) { ?>
                        <tr>
                            <td><?php echo $rate['dayOfWeek']; ?></td>
                            <td><?php echo $rate['rate']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    

                </div>
                <!-- Container-fluid -->
            </div>
            <!-- End of Main Content -->
           
        </div>
        <!-- End of Content Wrapper -->

</div>

  <!-- Logout Modal-->
  <?php include "inc/logoutmodal.php"; ?>
   

    <!-- Bootstrap core JavaScript-->
    <!-- Core plugin JavaScript-->
    <!-- Custom scripts for all pages-->
    <?php include "inc/assets.php"; ?>
    

</body>  

</html>

