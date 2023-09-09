<?php 
session_start(); 
include "db_conn.php";

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
		header("Location: index.php?error=Username or Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{


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
                    $_SESSION['uname_or_email'] = $row['email']; //can use to pass the value into emailverifypage
					
					//$_SESSION['user_name'] = $row['user_name']; //these 3 $_session can user to store value and pass on to another page
            		//$_SESSION['name'] = $row['name'];
            		//$_SESSION['id'] = $row['id'];


					// Check if the user's email is verified and not in a "pending" state
				if ($row['verified_email'] == "pending") {
					die("Please verify your email <a href='emailverifypage.php?email=" . $row['email'] . "'>from here</a>");
				}elseif($row['verified_email'] == "verified"){

					$userType=$row['userType'];
					
						if($userType == "customer"){
							
							header("Location: customer.php");
							exit();
						}
						elseif($userType == "staff"){
							
							header("Location: staff.php");
							exit();
						}
						elseif($userType == "admin"){
							
							header("Location: admin.php");
							exit();
						}
						else{
							echo 'error';
						}
					
					}
					else{
						header("Location: index.php?error=Verification error");
						exit();
					}
		
				} else {
					// Incorrect password
					header("Location: index.php?error=Incorrect password");
					exit();
				}


		} else {
			header("Location: index.php?error=Incorrect email");
			exit();
		}
		} else {

			// The input is not an email address, so assume it's a username and use it to query the database
			$sql = "SELECT * FROM user WHERE username='$uname_or_email'";
			$result = mysqli_query($conn, $sql);
    
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			$user = mysqli_fetch_object($result);
				// Verify the password
				if (password_verify($pass, $row['password'])) {

					// Store the username in the session
                    $_SESSION['uname_or_email'] = $row['username']; //can use to pass the value into emailverifypage

					//$_SESSION['user_name'] = $row['user_name']; //these 3 $_session can user to store value and pass on to another page
            		//$_SESSION['name'] = $row['name'];
            		//$_SESSION['id'] = $row['id'];


					// Check if the user's email is verified and not in a "pending" state
				if ($row['verified_email'] == "pending") {
					die("Please verify your email <a href='emailverifypage.php?email=" . $row['email'] . "'>from here</a>");
				}
				elseif($row['verified_email'] == "verified"){

					$userType=$row['userType'];
					
					if($userType == "customer"){
						
						header("Location: customer.php");
						exit();
					}
					elseif($userType == "staff"){
						
						header("Location: staff.php");
						exit();
					}
					elseif($userType == "admin"){
						
						header("Location: admin.php");
						exit();
					}
					else{
						echo 'error';
					}

				}
				else{
					header("Location: index.php?error=Verification error");
					exit();
				}

				} else {
					// Incorrect password
					header("Location: index.php?error=Incorrect password");
					exit();
				}


		} else {
			header("Location: index.php?error=Incorrect username");
			exit();
		}
		}
		
		
	}
}else{
	header("Location: ../webpage/index.php");
}

?>