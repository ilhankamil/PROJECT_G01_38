<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

// Set the default value for userType to 'customer'
$userType = 'customer';

// Set the default value for Verified_email to pending
//$verified_email = 'pending';

if (isset($_POST['uname']) && isset($_POST['password'])  && isset($_POST['email']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);

	$user_data = 'uname='. $uname;

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
    header("Location: registerpage.php?error=Re Password is required&$user_data");
    exit();
}
else if($pass !== $re_pass){
    header("Location: registerpage.php?error=The confirmation password  does not match&$user_data");
    exit();
}
else{
    $conn=mysqli_connect("localhost","proadmin38","proadmin38","proonebadmintoncentre");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        //hashing password
        $pass = md5($pass);

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
        $sql = "INSERT INTO customer (username, email, password) VALUES ('$uname', '$email', '$pass')";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            // Insert user data into the 'user' table
            $sql = "INSERT INTO user (username, email, password, userType, Verified_email) VALUES ('$uname', '$email', '$pass', '$userType', '$verified_email')";
            $result = mysqli_query($conn, $sql);
        
            if ($result) {
                header("Location: registerpage.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: registerpage.php?error=Unknown error occurred");
                exit();
            }
        } else {
            header("Location: registerpage.php?error=Unknown error occurred");
            exit();
            }
        }
    } 
}else{
	header("Location: registerpage.php");
	exit();
}







// when user clicked register, it system will send verification through google email
if (isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'proonebcadm1n@gmail.com';

        //SMTP password
        $mail->Password = 'proone123';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('proonebcadm1n@gmail.com', 'ProOneBadmintonAdmin');

        //Add a recipient
        $mail->addAddress($email, $name);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        // echo 'Message has been sent';

        // connect with database
        $conn=mysqli_connect("localhost","proadmin38","proadmin38","proonebadmintoncentre");
        // Check for database connection errors
        if (!$conn) {
            throw new Exception("Database connection failed: " . mysqli_connect_error());
        }
        // insert in users table
        $sql = "INSERT INTO user (verification_code) VALUES ('" . $verification_code . "')";
        mysqli_query($conn, $sql);

        mysqli_close($conn);

        header("Location: email-verification.php?email=" . $email);
        exit();
    } 
    catch (Exception $e) {
        echo "Message could not be sent and/or database operation failed: " . $e->getMessage();
    }
}
?>

