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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Pro One Badminton Center</a>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="#">Book</a>
                    </li>
                </ul>

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4" style="height: 25px; padding: 20px;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Your profile</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg" style="width: 42px; height: 42px;">
                            </a>
                            
  <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        <!-- Add "View Profile" button -->
        <a class="dropdown-item" href="profile.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            View Profile
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </div>
</li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
        </div>
    </nav>

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

                <style>
        /* Style for the table container */
        .table {
            width: 400px; /* Set the width to create a square */
            height: 200px; /* Set the height to create a square */
            margin: 0 auto; /* Center the container horizontally */
            background-color: #f7f7f7; /* Background color for the shadow */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); /* Add a shadow effect */
            padding: 5px; /* Add padding for content */
            overflow-y: auto; /* Add vertical scroll if content overflows */
            border: 1px solid #000; /* Add a border around the container */
        }

        /* Style for the table */
        .table table {
            width: 100%;
            border-collapse: collapse; /* Collapse the table borders */
        }

        /* Style for table headers */
        .table th {
            background-color: #333; /* Header background color */
            color: #fff; /* Header text color */
            border: 1px solid #000; /* Add a border around header cells */
            padding: 8px; /* Add padding to header cells */
        }

        /* Style for table cells */
        .table td {
            text-align: center; /* Center-align cell content */
            border: 1px solid #000; /* Add a border around data cells */
            padding: 8px; /* Add padding to data cells */
        }
    </style>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                 <h1 class="h3 mb-4 text-gray-800" style="text-align: center;">Court Rates</h1>
            
                 <!-- Display court rates in a table or styled format -->
                    <table class="table">
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
<br><br><br>

    

                  
                </div>
                <!-- Container-fluid -->
            </div>
            <!-- End of Main Content -->
            
        </div>
        <!-- End of Content Wrapper -->

</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../webpage/index.php">Logout</a>
                    <!--href="login.html"-->
                </div>
            </div>
        </div>
    </div>
   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>





</html>

