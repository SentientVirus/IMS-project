<?php
include("connectDB.php");

if (isset($_POST["D_name"])) {
  $D_name = $_POST["D_name"];
  echo $D_name;
  $D_desc = $_POST["D_desc"];
  echo $D_desc;
  $query = "INSERT INTO Diseases (disease_name, description) VALUES (\"{$D_name}\", \"{$D_desc}\");";

    if ($link->query($query) === TRUE) {
        echo "<br>Disease data inserted successfully";
    } else {
        echo "<br>Error inserting Disease data " . $link->error;}
  }

else {
  echo "your input is wrong";
}






include("disconnectDB.php");




 ?>
