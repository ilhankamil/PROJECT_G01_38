<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16)); //generate random token value

$token_hash = hash("sha256", $token); //hash the token

$expiry = date("Y-m-d H:i:s", time() + 60 * 30 ); //token valid for 30min //expiry token incase of attacker trying to brute force 

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE user
        SET reset_token_hash = ?, 
            reset_token_expires_at = ?
        WHERE email = ?";
//question mark to prevent sql injection

$stmt = $mysqli->prepare($sql); 

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {

    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom('proonebcadm1n@gmail.com', 'ProOneAdmin');
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://localhost/PROJECT_G01_38/forgotpass/reset-password.php?token=$token">here</a> 
    to reset your password.

    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

    }

}

echo "Message sent, please check your inbox."; 
header("refresh:1;url=../webpage/index.php");
exit();
?>