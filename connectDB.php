<?php
$hostname = "localhost";
$username = "f2fd";
$password = "imsproject";
$dbname = "f2fd_db";
$link = mysqli_connect($hostname, $username, $password, $dbname);

if (!$link){
  echo "Error: Unable to connect to MySQL." .
  mysqli_connect_error() . PHP_EOL;
  exit;
}
?>
