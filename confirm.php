<?php
	session_start();
?>
<?php
	function redirect() {
		header('Location: register.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	}
	else{
		include 'connectDB.php';
		$email = mysqli_real_escape_string($link, $_GET['email']);
		$token = mysqli_real_escape_string($link, $_GET['token']);

		$query = "SELECT id FROM Users WHERE email = '$email' AND token = '$token' AND activated=0";
		$rs = mysqli_query($link, $query);
		$numRows = mysqli_num_rows($rs);
				
		if($numRows  > 0) {
			$query = "UPDATE Users SET token='', activated=1 WHERE email='$email'";
			mysqli_query($link, $query);
			$_SESSION['message'] = "Your email has been verified, you can login now!";
			header('Location: login.php');
		}
		else {
			redirect();
		}
		include 'disconnectDB.php';
	}
?>