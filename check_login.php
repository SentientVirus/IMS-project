<?php
////check captchacode

// session_start();
// if (isset($_POST['submit']))
//{
//    if(($_POST['captchacode']) == $_SESSION['captchacode'])
//        { // Do process the other submitted form data 
//        }
//    else
//        { $_SESSION['error']= "The Captcha code is wrong. Try again.";
//        // redirect to another page or to the form page again
//        header("register.php"); // this is a link back to our register.php
//        exit();
//    }
//}
include 'connectDB.php';

$email = $_POST['email'];
$password = $_POST['password'];

// To avoid SQL Injection
//$email = mysql_real_escape_string($email);
//$password = mysql_real_escape_string($password);

//hash password 
$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

// check that email & password combination exist
// $result = "SELLECT id FROM Users WHERE email=$email AND password = $hashPassword";
// 
// 
// check that email & password combination exist
// if ($result == NULL ) {
// 	echo 
// 	header("login.php")
// }

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
		header('Location: http://localhost:8888/login.php');
		echo "Wrong Password";
	}
}
else {
	echo "No User found";
}

// later: check if valid email address by sending email 

include 'disconnectDB.php';


?>


