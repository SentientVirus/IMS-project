<?php
	session_start();
?>

<?php
	include 'connectDB.php';

	// To avoid SQL Injection
	$email_username = mysqli_real_escape_string($link, $_POST['email/username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);

	//hash password 
	$options = array("cost"=>4);
	$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

	$query = "SELECT id, password, activated FROM Users WHERE email = '".$email_username."' OR username = '".$email_username."' ";
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
				// this needs to be changed to a hompage where you are already logged in
				header('Location: index.php');
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
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
