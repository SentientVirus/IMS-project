<?php
include 'connectDB.php';

// get values from user input in html register.php 
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirmpassword"];

$query = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email', '$password')";
mysqli_query($link, $query);

include 'disconnectDB.php';

header('Location: http://localhost:8888/login.php');

?>
