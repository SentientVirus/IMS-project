<?php
include 'connectDB.php';

// Get values from user input in html register.php 
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirmpassword"];

// To avoid SQL Injection
//$username = mysql_real_escape_string($username);
//$email = mysql_real_escape_string($email);
//$password = mysql_real_escape_string($password);
//$confirmpassword = mysql_real_escape_string($confirmpassword);

//hash password 
$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

$query = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email', '$hashPassword')";
mysqli_query($link, $query);

include 'disconnectDB.php';

header('Location: http://localhost:8888/login.php');

?>
