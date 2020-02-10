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
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// check that email & password combination exist
$result = "SELLECT id FROM Users WHERE email=$email AND password = $hashed_password";

if ($result == NULL ) {
	
	header("login.php")
}

// later: check if valid email address by sending email 

include 'disconnectDB.php';

header('Location: http://localhost:8888/homepage.php');
?>




