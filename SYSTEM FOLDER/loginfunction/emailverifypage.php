<!DOCTYPE html>
<html>
<head>
    <title>Verify</title>
    <link rel="stylesheet" type="text/css" href="thestyle.css">
</head>
<body>
     <div class="row">
        <h1>Email Verification</h1>
<form action="emailverifyfunction.php" method="POST">
    <h2>Verification</h2>
<?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

           <div class="form-group">
                <input type="number" name="verification_code" placeholder="Enter verification code" required />
                <p><label for="verification_code">Verification Code</label></p>
    <input type="submit" name="verify_email" value="Verify Email">
            </div>


</form>
</body>
</html>