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
        <html>
            <head>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        line-height: 1.6;
                        color: #333;
                    }

                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                    }

                    .reset-link {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #fff;
                        text-decoration: none;
                        border-radius: 5px;
                    }

                    .disclaimer {
                        font-size: 12px;
                        margin-top: 20px;
                        color: #888;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h2>Password Reset</h2>
                    <p>
                        You've requested to reset your password. Click the link below to proceed with the reset:
                    </p>
                    <p>
                        Click <a  href="http://localhost/PROJECT_G01_38/forgotpass/reset-password.php?token=$token">here</a> 
                        to reset your password.
                    </p>
                    <p class="disclaimer">
                        If you did not request a password reset, please ignore this email. 
                    </p>
                </div>
            </body>
        </html>
    END;

    $mail->isHTML(true);

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
