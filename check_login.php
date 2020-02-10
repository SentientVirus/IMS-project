<?php

include 'connectDB.php';

$email = $_POST['email'];
$password = $_POST['password'];

// To avoid SQL Injection
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);

//hash password 
$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

$query = "select * from users where email = '".$email."'";
$rs = mysqli_query($link, $query);
$numRows = mysqli_num_rows($rs);
	
if($numRows  == 1){
	$row = mysqli_fetch_assoc($rs);
	if(password_verify($password, $row['password'])){
		echo "Password verified";
		// this needs to be changed to a hompage where you are already logged in, 
		// but I guess that will be solved automaticly wih the sessions? 
		header('Location: http://localhost:8888/index.php');
	}
	else{
		// change this so the error message appear on same page
		echo "Wrong Password";
	}
}
else {
	// change this so the error message appear on same page
	echo "No User found";
}

// later: check if valid email address by sending email 

include 'disconnectDB.php';

?>


