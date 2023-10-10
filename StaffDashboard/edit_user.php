<?php
// Include your database connection script (e.g., dbconnect.php)
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    // Retrieve the username from the URL parameter
    $username = $_GET['username'];

    // Check if the user is logged in and has appropriate privileges (e.g., admin)
    // You should implement your authentication and authorization logic here

    // Fetch user data from the database based on the username
    $sql = "SELECT * FROM user WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Display an HTML form to edit user information
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Edit User - Staff Dashboard</title>
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link href="css/sb-admin-2.min.css" rel="stylesheet">
        </head>

        <body id="page-top">
            <div id="wrapper">
                <!-- Sidebar -->
                <!-- Include your sidebar content here (similar to your existing code) -->
                <!-- End of Sidebar -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <!-- Topbar -->
                        <!-- Include your topbar content here (similar to your existing code) -->
                        <!-- End of Topbar -->
                        <div class="container-fluid">
                            <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
                            <p class="mb-4">Edit user details.</p>
                            <!-- User Edit Form -->
                            <form method="POST" action="update_user.php">
                                <input type="hidden" name="username" value="<?php echo $user['username']; ?>">
                                <div class="form-group">
                                    <label for="new_username">Username</label>
                                    <input type="text" class="form-control" id="new_username" name="new_username" value="<?php echo $user['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="new_email">Email</label>
                                    <input type="email" class="form-control" id="new_email" name="new_email" value="<?php echo $user['email']; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="js/sb-admin-2.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
