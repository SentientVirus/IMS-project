<?php
	session_start();
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['captchacode']) && $_POST['captchacode'] == $_SESSION['captcha_text']) {

	include 'connectDB.php';

	// To avoid SQL Injection
	$username = mysqli_real_escape_string($link, $_POST["username"]);
	$username = str_replace("%","\%",$username);
	$username = str_replace("_","\_",$username);
	$email = mysqli_real_escape_string($link, $_POST["email"]);
	$email = str_replace("%","\%",$email);
	$email = str_replace("_","\_",$email);
	$password = mysqli_real_escape_string($link, $_POST["password"]);
	$password = str_replace("%","\%",$password);
	$password = str_replace("_","\_",$password);

	// This will remove all the illegal characters from the email.
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	// Then we validate the email.
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// the email is valid
	}
	else {
		$_SESSION['error'] = "<p style = 'color:red;'><b>$email is not a valid email address</b></p>";
		header('Location: register.php');
	}

	// Check that email doesn't already exist
	$query = "SELECT id FROM Users WHERE email = '".$email."'";
	$rs = mysqli_query($link, $query);
	$numRows = mysqli_num_rows($rs);
	if($numRows > 0){
		$_SESSION['error'] = "<p style = 'color:red;'><b>This email already exist, please try another.</b></p>";
		header('Location: register.php');
		}
	else {
		// CHeck that username doesn't already exist
		$query = "SELECT id FROM Users WHERE username = '".$username."'";
		$rs = mysqli_query($link, $query);
		$numRows = mysqli_num_rows($rs);
		if($numRows > 0){
			$_SESSION['error'] = "<p style = 'color:red;'><b>This username already exist, please try another.</b></p>";
			header('Location: register.php');
			}
		else {

			$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!$/()*';
			$token = str_shuffle($token);
			$token = substr($token, 0, 20);

			// Hash password
			$options = array("cost"=>8);
			$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

			// Add user
			$query = "INSERT INTO Users (username, email, password, activated, token) VALUES ('$username', '$email', '$hashPassword', '0', '$token')";
			mysqli_query($link, $query);

			include 'disconnectDB.php';

			include_once "PHPMailer/PHPMailer.php";
			require_once "PHPMailer/SMTP.php";
        	require_once "PHPMailer/Exception.php";

			$mail = new PHPMailer();

			//SMTP Settings
        	$mail->isSMTP();
        	$mail->Host = "smtp.gmail.com";
        	$mail->SMTPAuth = true;
        	$mail->Username = "f2fdIMS@gmail.com";
        	$mail->Password = 'IMSproject123';
        	$mail->Port = 465; //587
        	$mail->SMTPSecure = "ssl"; //tls

			//Email settings
			$mail -> isHTML(true);
			$mail -> setFrom('f2fdIMS@gmail.com');
			$mail -> addAddress($email, $username);
			$mail -> Subject = 'Please verify your email!';

			// Were not able to change this link to just confirm.php?email=$email&token=$token
			// So it needs to be changed if you have another localhost address
			$mail -> Body = "Please click on the link below to verify your email: <br><br>
			<a href='f2fd.dev/confirm.php?email=$email&token=$token'>Click here</a>";

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
	$_SESSION['error']= "<p style = 'color:red;'><b>The captcha code is wrong. Try again.</b></p>";
	header('Location: register.php');
}

?>
