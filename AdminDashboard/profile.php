<?php
session_start();
include "dbconnect.php";

// Check if the admin is logged in
if (!isset($_SESSION['uname_or_email'])) {
    header("Location: ../webpage/index.php"); // Redirect to the login page if not logged in
    exit();
}

$uname_or_email = $_SESSION['uname_or_email'];

$sql = "SELECT username, email, password FROM user WHERE email='$uname_or_email' OR username='$uname_or_email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $admin = mysqli_fetch_assoc($result); // Fetch the admin's data
} else {
    echo "Error fetching admin data"; // Handle the case where no results are found
}

mysqli_close($conn); // Close the connection

// Check if there is a success or error message in the query parameters
$successMessage = isset($_GET['success']) ? 'Profile updated successfully.' : '';
$errorMessage = isset($_GET['error']) ? 'Error updating profile.' : '';
$errorMessage .= isset($_GET['message']) ? '<br>' . $_GET['message'] : ''; // Append detailed error message if available
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pro Badminton Centre - Profile</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <a class="collapse-item" href="button.php">Booked Courts</a>
                <a class="collapse-item" href="usermanage.php">User Management</a>
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


    <!-- You can add any other profile-related links here if needed -->

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
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Your topbar content remains the same -->
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">View/Edit Profile</h1>

<!-- Profile Information -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Profile Details
            </div>
            <div class="card-body" id="profileDetails"> <!-- Add an ID to this div for JavaScript -->
                <!-- Display Profile Details from Database -->
                <div class="form-group">
                    <label for="adminUsername">Username:</label>
                    <input type="text" class="form-control" id="adminUsername" value="<?php echo $admin['username']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="adminEmail">Email:</label>
                    <input type="email" class="form-control" id="adminEmail" value="<?php echo $admin['email']; ?>" disabled>
                </div>
                <!-- Add more fields as needed -->
                <button id="editProfileButton" class="btn btn-primary">Edit Profile</button> <!-- Add a button to trigger the edit form -->
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Information Form (Initially Hidden) -->
<div class="row mt-4" id="editProfileForm" style="display: none;"> <!-- Add an ID to this div for JavaScript -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Edit Profile
            </div>
            <div class="card-body">
                <!-- Form for editing profile details -->
                <form action="update_profile.php" method="POST">
                    <div class="form-group">
                        <label for="newUsername">New Username:</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername" placeholder="Enter New Username" value="<?php echo $admin['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="newEmail">New Email:</label>
                        <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="Enter New Email" value="<?php echo $admin['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="newEmail">New Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter New Password" ?>
                    </div>
                    <div class="form-group">
                        <label for="newEmail">Re-type New Password:</label>
                        <input type="password" class="form-control" id="renewPassword" name="renewPassword" placeholder="Re enter New Password"  ?>
                    </div>

                     <!-- Message container for displaying error or success messages -->
                     <div id="profileMessageContainer">
                        <?php
                        if (!empty($successMessage)) {
                            echo '<div class="alert alert-success">' . $successMessage . '</div>';
                        } elseif (!empty($errorMessage)) {
                            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
                        }
                        ?>
                    </div>

                    <!-- Add more fields as needed -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <button id="cancelEditButton" class="btn btn-secondary mt-2">Cancel</button> <!-- Add a button to cancel editing -->
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to toggle between profile details and edit form -->
<script>
    const profileDetails = document.getElementById('profileDetails');
    const editProfileForm = document.getElementById('editProfileForm');
    const editProfileButton = document.getElementById('editProfileButton');
    const cancelEditButton = document.getElementById('cancelEditButton');

    editProfileButton.addEventListener('click', () => {
        profileDetails.style.display = 'none';
        editProfileForm.style.display = 'block';
    });

    cancelEditButton.addEventListener('click', () => {
        editProfileForm.style.display = 'none';
        profileDetails.style.display = 'block';
    });
</script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- Your footer content remains the same -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Your logout modal content remains the same -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

