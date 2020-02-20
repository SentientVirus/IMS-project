<?php
include("connectDB.php");

if (isset($_POST["D_name"])) {
  $D_name = $_POST["D_name"];
  $D_desc = $_POST["D_desc"];
  $query = "INSERT INTO Diseases (disease_name, description) VALUES ({$D_name}, {$D_desc})";
  mysqli_query($link, $query);
}

if (isset($_POST["T_name"])) {
  $T_name = $_POST["T_name"];
  $C_D_name = $_POST["C_D_name"];
  // doesnt make sense below
  $query = "INSERT INTO Diseases (disease_name, description) VALUES ({$disease_name}, {$disease_desc})";
  mysqli_query($link, $query);
}













 ?>
