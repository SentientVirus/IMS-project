<?php
include 'connectDB.php';

// get values from user input 
$email= $_POST["email"];
$password = $_POST["password"];

$query = "INSERT INTO Users (email, password) VALUES ($email, $password)";
mysqli_query($link, $query);

include 'disconnectDB.php';
?>