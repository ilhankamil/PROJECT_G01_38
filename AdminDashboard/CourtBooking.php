<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
                    .grid {
                        width: 150px;
                        height: 200px;
                        background-color: #ccc;
                        transition: background-color 0.3s;
                        border-radius: 5px; /* Adds smooth edges */
                        padding: 5px;
                        text-align: center; /* Centers the label */
                        justify-content: center;
                        align-items: center;
                    }

                    .grid:hover {
                        background-color: #4992FF;
                    }
                    


            /* Custom gutters ( Gutters are the blank spaces between the columns)
                    I put here for example just incase if needed
                    $grid-gutter-width: 1.5rem;
                    $gutters: (
                    0: 0,
                    1: $spacer * .25,
                    2: $spacer * .5,
                    3: $spacer,
                    4: $spacer * 1.5,
                    5: $spacer * 3,
                );

            */
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN DASHBOARD <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data:</h6>
                    <a class="collapse-item" href="CourtBooking.php">Booked Courts</a>
                        <a class="collapse-item" href="usermanage.php">User Management</a>
                        <a class="collapse-item" href="court_rate/rateList.php">Court Rate</a>
                        <a class="collapse-item" href="court_availability/courtList.php">Court List</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Other :</h6>
                        <a class="collapse-item" href="contact.php">Contact Us</a>
                        <a class="collapse-item" href="about.php">About Us</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

   
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                  
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                     <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Your profile</span>

                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   <!-- Page Heading (Here is to display the responsive court-->
                    <h1 class="h3 mb-2 text-gray-800">Booked Courts</h1>

                    <div class="container overflow-hidden">
                        <div class="row gy-3">
                            <div class="col-2">
                            <div class="grid">C1</div>
                        </div>
                        <div class="col-2">
                            <div class="grid">C2</div>
                        </div>
                        <div class="col-2">
                            <div class="grid">C3</div>
                        </div>
                        <div class="col-5">
                            <div class="grid">C4</div>
                        </div>
                        <div class="col-2">
                            <div class="grid">C5</div>
                        </div>
                        <div class="col-2">
                            <div class="grid">C6</div>
                        </div>
                        <div class="col-2">
                            <div class="grid">C7</div>
                        </div>
                        <div class="col-6">
                            <div class="grid">C8</div>
                        </div>
                    </div>
    
    <br><br><br>


    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Courts</h6>
    </div>
    <div class="card-body">
        <label for="selectedcourt">Selected Court:</label>
        <input type="text" id="selectedcourt" name="selectedcourt" readonly>
        <label for "selecteddate">Select Date:</label>
        <input type="date" id="selecteddate" name="selecteddate">
    </div>

    <div id="table-container" class="card shadow mb-4" style="display: none;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Data</h6>
        </div>
        <div class="card-body">
            <table id="booking-table" class="table">
                <thead>
                    <tr>
                        <th>Booking Reference</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Hours</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
    function getSelectedCourt(clickedGrid) {
        return clickedGrid.innerText;
    }

    const grids = document.querySelectorAll('.grid');
    const selectedCourtInput = document.getElementById('selectedcourt');
    const selectedDateInput = document.getElementById('selecteddate');

    grids.forEach(grid => {
        grid.addEventListener('click', function () {
            const selectedCourt = getSelectedCourt(grid);
            selectedCourtInput.value = selectedCourt;
            selectedDateInput.value = ''; // Clear the date input
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#selecteddate').on('change', function () {
            var selectedDate = $(this).val();
            var selectedCourt = $('#selectedcourt').val();

            $.ajax({
                type: "POST",
                url: "FetchCourtBooking.php",
                data: {
                    date: selectedDate,
                    court: selectedCourt
                },
                success: function (data) {
                    var tableBody = $('#table-body');
                    tableBody.html(data);
                    $('#table-container').show();
                },
                error: function () {
                    alert("An error occurred while fetching data.");
                }
            });
        });
    });
</script>

<style>
    .action-icons {
        margin-right: 10px;
    }
</style>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script> 



</body>

</html>