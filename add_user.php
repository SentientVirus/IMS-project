<?php
	session_start();
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['captchacode']) && $_POST['captchacode'] == $_SESSION['captcha_text']) {			

	include 'connectDB.php';
	
	// To avoid SQL Injection 
	$username = mysqli_real_escape_string($link, $_POST["username"]);
	$email = mysqli_real_escape_string($link, $_POST["email"]);
	$password = mysqli_real_escape_string($link, $_POST["password"]);

	// This will remove all the illegal characters from the email.
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	// Then we validate the email.
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
		// the email is valid
	}
	else { 
		$_SESSION['error'] = "$email is not a valid email address";
		header('Location: register.php');
	}
	
	// Check that email doesn't already exist 
	$query = "SELECT id FROM Users WHERE email = '".$email."'";
	$rs = mysqli_query($link, $query);
	$numRows = mysqli_num_rows($rs);
	if($numRows > 0){
		$_SESSION['error'] = "This email already exist, try another.";
		header('Location: register.php');
		}
	else {	
		// CHeck that username doesn't already exist
		$query = "SELECT id FROM Users WHERE username = '".$username."'";
		$rs = mysqli_query($link, $query);
		$numRows = mysqli_num_rows($rs);
		if($numRows > 0){
			$_SESSION['error'] = "This username already exist, try another.";
			header('Location: register.php');
			}
		else {
			
			$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!$/()*';
			$token = str_shuffle($token);
			$token = substr($token, 0, 20);
	
			// Hash password 
			$options = array("cost"=>4);
			$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

			// Add user 
			$query = "INSERT INTO Users (username, email, password, activated, token) VALUES ('$username', '$email', '$hashPassword', '0', '$token')";
			mysqli_query($link, $query);
		
			include 'disconnectDB.php';
		
			include_once "PHPMailer/PHPMailer.php";
		
			$mail = new PHPMailer();
			$mail -> setFrom('f2fd_IMS@outlook.com');
			$mail -> addAddress($email, $username);
			$mail -> Subject = 'Please verify your email!';
			$mail -> isHTML(true);
			
			// Were not able to change this link to just confirm.php?email=$email&token=$token
			// So it needs to be changed if you have another localhost address
			$mail -> Body = "Please click on the link below to verify your email: <br><br> 
			<a href='http://localhost:8888/confirm.php?email=$email&token=$token'>Click here</a>";
		
			if ($mail->send()) {
				$_SESSION['message'] = nl2br("You have been registerd! \nA conformation email has been sent to $email, please verify your email. ");
				header('Location: register.php');
			}
			else {
				$_SESSION['error'] = "Ops, something went wrong, please try again!";
				header('Location: register.php');
			}
		}
	}
}
else {
	$_SESSION['error']= "The captcha code is wrong. Try again.";
	header('Location: register.php'); 
}

?>
