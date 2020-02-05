<?php
include 'connectDB.php';

// get values from user input 
$username = $_POST["username"]
$email = $_POST["email"];
$password = $_POST["password"];
$confirmpassword = $_POST["confirmpassword"];

$query = "INSERT INTO Users (email, password) VALUES ($email, $password)";
mysqli_query($link, $query);

include 'disconnectDB.php';
?>