<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add User - Pro Badminton Centre</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<style>
    .error-message {
        color: red;
        font-size: 14px;
    }
</style>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Add User</h1>
                    <p class="mb-4">Please fill in the following information to add a new user:</p>
                    <form method="post" action="process_add_user.php">
                    <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <!-- Error message for username -->
                            <div id="usernameError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                               <!-- Error message for email -->
                               <div id="emailError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <!-- Error message for password -->
                            <div id="passwordError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="userType">User Type</label>
                            <select class="form-control" id="userType" name="userType" required>
                              <!--  <option value="customer">Customer</option> -->
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <!-- You can add more fields here based on the user type -->
                        <!--a field for both "staff" and "customer" -->
                        <br>
                        <button type="submit" class="btn btn-primary">Add User</button>
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
