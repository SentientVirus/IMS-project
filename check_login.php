<?php
	session_start();
?>

<?php
	include 'connectDB.php';

	// To avoid SQL Injection
	$email_username = mysqli_real_escape_string($link, $_POST['email/username']);
	$email_username = str_replace("%","\%",$email_username);
	$email_username = str_replace("_","\_",$email_username);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$password = str_replace("%","\%",$password);
	$password = str_replace("_","\_",$password);


	//hash password
	$options = array("cost"=>9);
	$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

	$query = "SELECT id, username, email, password, activated FROM Users WHERE email = '".$email_username."' OR username = '".$email_username."' ";
	$rs = mysqli_query($link, $query);
	$numRows = mysqli_num_rows($rs);

	if($numRows  == 1) {
		$row = mysqli_fetch_array($rs);
		if(password_verify($password, $row['password'])){
			if ($row['activated'] == 0) {
				$_SESSION['error'] = "Please verify your email!";
				header('Location: login.php');
			}
			else {
				echo "Password verified";
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['email'] = $row['email'];
				// this needs to be changed to a hompage where you are already logged in
				header('Location: index.php');
			}
		}
		else {
			$_SESSION['error'] = "Wrong password";
			header('Location: login.php');
		}
	}
	else {
		$_SESSION['error'] = "No user found";
		header('Location: login.php');
	}

	include 'disconnectDB.php';

?>
