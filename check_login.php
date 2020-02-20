<?php
	session_start();
?>
<?php

include 'connectDB.php';

$email_username = $_POST['email/username'];

$password = $_POST['password'];

// To avoid SQL Injection
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);

//hash password 
$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

$query = "select * from users where email = '".$email_username."' or username = '".$email_username."' ";
$rs = mysqli_query($link, $query);
$numRows = mysqli_num_rows($rs);

	
if($numRows  == 1) {
	$row = mysqli_fetch_assoc($rs);
	if(password_verify($password, $row['password'])){
		echo "Password verified";
		// this needs to be changed to a hompage where you are already logged in
		header('Location: index.php');
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
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

// Send confirmation email when register
// Login with either email or username
// add a link to register on the loginpage
// HHTTPS if hae time 

include 'disconnectDB.php';

?>




