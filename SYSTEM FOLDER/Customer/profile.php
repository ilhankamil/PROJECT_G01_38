<?php
session_start();
include "dbconnect.php";

// Check if the customer is logged in
if (!isset($_SESSION['uname_or_email'])) {
    header("Location: ../webpage/index.php"); // Redirect to the login page if not logged in
    exit();
}

$uname_or_email = $_SESSION['uname_or_email'];

$sql = "SELECT username, email, password FROM user WHERE email='$uname_or_email' OR username='$uname_or_email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $customer = mysqli_fetch_assoc($result); // Fetch the customer's data
} else {
    echo "Error fetching customer data"; // Handle the case where no results are found
}

mysqli_close($conn); // Close the connection

// Check if there is a success or error message in the query parameters
$successMessage = isset($_GET['success']) ? 'Profile updated successfully.' : '';
$errorMessage = isset($_GET['error']) ? 'Error updating profile.' : '';
$errorMessage .= isset($_GET['message']) ? '<br>' . $_GET['message'] : ''; // Append detailed error message if available
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pro One Badminton Centre</title>
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
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Pro One Badminton Centre</a>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4" style="height: 25px; padding: 20px;">  
                </nav>
</div>
</nav>

<br>

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
                    <label for="customerUsername">Username:</label>
                    <input type="text" class="form-control" id="customerUsername" value="<?php echo $customer['username']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="customerEmail">Email:</label>
                    <input type="email" class="form-control" id="customerEmail" value="<?php echo $customer['email']; ?>" disabled>
                </div>
                <!-- Add more fields as needed -->
                <button id="editProfileButton" class="btn btn-primary" style="width: 130px;">Edit Profile</button> <!-- Add a button to trigger the edit form -->
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
                        <input type="text" class="form-control" id="newUsername" name="newUsername" placeholder="Enter New Username" value="<?php echo $customer['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="newEmail">New Email:</label>
                        <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="Enter New Email" value="<?php echo $customer['email']; ?>">
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
                    <button type="submit" class="btn btn-primary" style="width: 130px;">Save Changes</button>
                </form>
                <button id="cancelEditButton" class="btn btn-secondary mt-2" style="width: 130px;">Cancel</button> <!-- Add a button to cancel editing -->
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


