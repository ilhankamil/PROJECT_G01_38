<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer autoloader
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

// Set the default value for userType to 'customer'
$userType = 'customer';

// Set the default value for Verified_email to pending
$verified_email = 'pending';

//Send verification code
$verification_code = generateVerificationCode();

    

if (isset($_POST['uname']) && isset($_POST['email'])  && isset($_POST['phonenumber'])  && isset($_POST['passwordR']) && isset($_POST['confirm_password'])) {


	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $phonenumber = ($_POST['phonenumber']);
	$pass = validate($_POST['passwordR']);
	$re_pass = validate($_POST['confirm_password']);

	$user_data = 'uname='. $uname;
/*
 if (empty($uname)) {
    header("Location: registerpage.php?error=Username is required&$user_data");
    exit();
}
else if(empty($email)){
    header("Location: registerpage.php?error=Email is required&$user_data");
    exit();
}
else if(empty($pass)){
    header("Location: registerpage.php?error=Password is required&$user_data");
    exit();
}
else if(empty($re_pass)){
    header("Location: registerpage.php?error=Confirm password is required&$user_data");
    exit();
}
else if($pass !== $re_pass){
    header("Location: registerpage.php?error=The confirmation password  does not match&$user_data");
    exit();
}
else{
 
    } */

    //Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);

 try {
     // SMTP server settings for Gmail
     $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER; //Enable verbose debug output
     //Send using SMTP
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'proonebcadm1n@gmail.com'; // Your Gmail email address
     $mail->Password = 'lkihubdgfynutkyw';  // Your Gmail password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
     $mail->Port = 587; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        //For Gmail, should use port 587 with TLS encryption.
    
     // Sender information
     $mail->setFrom('proonebcadm1n@gmail.com', 'ProOneAdmin'); // Replace with your name and Gmail address

    //Add a recipient
    $mail->addAddress($email, $uname);

    // Email content
     $mail->isHTML(true);
     $mail->Subject = 'Email verification';
     $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' .$verification_code. '</b></p>';

     //send email
     $mail->send();
     echo 'Email sent successfully!';

 }catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
 }


    $conn=mysqli_connect("localhost","proadmin38","proadmin38","proonebadmintoncentre");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        //hashing password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Check if username is been taken
        $sql = "SELECT * FROM user WHERE username='$uname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        header("Location: registerpage.php?error=The username is taken, please try another");
        exit();
        }

        // Check if the email is already registered
        $sql= "SELECT * FROM user WHERE email='$email' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        header("Location: registerpage.php?error=The email is already registered, please use a different one");
        exit();
        }

        // Insert customer data into the 'customer' table
    //    $sql = "INSERT INTO customer (username, email, phonenumber, password) VALUES ('$uname', '$email','$phonenumber', '$pass')";
        $result = mysqli_query($conn, $sql); 

        if ($result) {

            // Insert user data into the 'user' table
            $sql = "INSERT INTO user (username, email, password, phonenumber, userType, verification_code, verified_email) VALUES ('$uname', '$email', '$pass', '$phonenumber', '$userType', '$verification_code', '$verified_email')";
            $result = mysqli_query($conn, $sql);
        
            if ($result) {
                header("Location: registerpage.php?success=Your account has been created successfully");
                exit();
            } 
        } else {
            header("Location: registerpage.php?error=Unknown error occurred");
            exit();
            }
        }
}else{
    print_r($_POST);
	//header("Location: registerpage.php");
	exit();
}


    /*

     header("Location: email-verification.php?email=" . $email);
     exit();
     }
     */
?>

<?php
function generateVerificationCode($length = 6) {
    $characters = '0123456789'; // Only digits
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

?>

