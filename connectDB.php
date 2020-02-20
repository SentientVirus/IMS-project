<?php
$hostname = "localhost";
$username = "f2fd";
$password = "imsproject";
$dbname = "f2fd_db";


//$hostname = "back.db1.course.it.uu.se";
//$username = "spring20_ims_5";
//$password = "jvM6geoi";
//$dbname = "spring20_ims_5";
$link = mysqli_connect($hostname, $username, $password, $dbname);

if (!$link){
  echo "Error: Unable to connect to MySQL." .
  mysqli_connect_error() . PHP_EOL;
  exit;
}
?>
