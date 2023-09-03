<?php
include "db_conn.php";
session_start();

$email = $_SESSION['uname_or_email'];

if (isset($_POST["verify_email"])) {
    $verification_code = $_POST["verification_code"];

    // Verify the email and verification code
    $sql = "SELECT * FROM user WHERE (email = '" . $email . "' OR username = '" . $email . "') AND verification_code = '" . $verification_code . "'";

    $result  = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Update the verified_email column to "approved"
        $update_sql = "UPDATE user SET verified_email = 'verified' WHERE email = '" . $email . "' OR username = '" . $email . "'";
        $update_result = mysqli_query($conn, $update_sql);

        if ($update_result) {
            echo "<p>Email has been verified and approved. You can now log in.</p>";
            // Redirect to homepage after a delay using JavaScript
            ?>
            <script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000); // 2000 milliseconds (2 seconds) delay
            </script>
            <?php
            exit();
        } else {
            echo "<p>Error updating email verification status.</p>";
        }
    } else {
        header("location:emailverifypage.php?error=Verification code failed");
    }
}

?>
