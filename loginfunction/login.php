<?php 
session_start(); 
include "db_conn.php";

$response = array(); // Initialize a response array

if (isset($_POST['uname_or_email']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname_or_email = validate($_POST['uname_or_email']);
    $pass = validate($_POST['password']);

    if (empty($uname_or_email)) {
        $response['error'] = "Username or Email is required"; // Set an error message in the response
    } elseif (empty($pass)) {
        $response['error'] = "Password is required"; // Set an error message in the response
    } else {
        // Check if the input looks like an email address
        if (filter_var($uname_or_email, FILTER_VALIDATE_EMAIL)) {
            // The input is an email address, so use it to query the database
            $sql = "SELECT * FROM user WHERE email='$uname_or_email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                // Verify the password
                if (password_verify($pass, $row['password'])) {

                    // Store the email in the session
                    $_SESSION['uname_or_email'] = $row['email'];

                    // Check if the user's email is verified and not in a "pending" state
                    if ($row['verified_email'] == "pending") {
                        $response['error'] = "Please verify your email <a href='../loginfunction/emailverifypage.php?email=" . $row['email'] . "'>from here</a>";
                    } elseif ($row['verified_email'] == "verified") {
                        $userType = $row['userType'];

                        if ($userType == "customer") {
                            $response['redirect'] = "customer.php"; // Set the redirect URL in the response
                        } elseif ($userType == "staff") {
                            $response['redirect'] = "staff.php"; // Set the redirect URL in the response
                        } elseif ($userType == "admin") {
                            $response['redirect'] = "admin.php"; // Set the redirect URL in the response
                        } else {
                            $response['error'] = "Unknown user type"; // Set an error message in the response
                        }
                    } else {
                        $response['error'] = "Verification error"; // Set an error message in the response
                    }
                } else {
                    $response['error'] = "Incorrect password"; // Set an error message in the response
                }
            } else {
                $response['error'] = "Incorrect email"; // Set an error message in the response
            }
        } else {
            // The input is not an email address, so assume it's a username and use it to query the database
            $sql = "SELECT * FROM user WHERE username='$uname_or_email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                // Verify the password
                if (password_verify($pass, $row['password'])) {

                    // Store the username in the session
                    $_SESSION['uname_or_email'] = $row['username'];

                    // Check if the user's email is verified and not in a "pending" state
                    if ($row['verified_email'] == "pending") {
                        $response['error'] = "Please verify your email <a href='../loginfunction/emailverifypage.php?email=" . $row['email'] . "'>from here</a>";
                    } elseif ($row['verified_email'] == "verified") {
                        $userType = $row['userType'];

                        if ($userType == "customer") {
                            $response['redirect'] = "customer.php"; // Set the redirect URL in the response
                        } elseif ($userType == "staff") {
                            $response['redirect'] = "staff.php"; // Set the redirect URL in the response
                        } elseif ($userType == "admin") {
                            $response['redirect'] = "admin.php"; // Set the redirect URL in the response
                        } else {
                            $response['error'] = "Unknown user type"; // Set an error message in the response
                        }
                    } else {
                        $response['error'] = "Verification error"; // Set an error message in the response
                    }
                } else {
                    $response['error'] = "Incorrect password"; // Set an error message in the response
                }
            } else {
                $response['error'] = "Incorrect username"; // Set an error message in the response
            }
        }
    }
} else {
    $response['error'] = "Invalid request"; // Set an error message in the response
}

// Send the response as JSON
header("Content-Type: application/json");
echo json_encode($response);
