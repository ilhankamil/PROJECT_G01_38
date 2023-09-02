<!DOCTYPE html>
<html>
<head>
	<title>Verify</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="emailverifyfunction.php" method="POST">
    <h2>Verification</h2>
<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
    <input type="number" name="verification_code" placeholder="Enter verification code" required />
    <input type="submit" name="verify_email" value="Verify Email">
</form>
</body>
</html>