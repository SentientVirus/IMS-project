<?php
include("connect_f2fd.php");

$sql = "DROP TABLE if exists User";

         if(mysqli_query($link, $sql)) {
            echo "Table is deleted successfully<br />";
         } else {
            echo "Table is not deleted successfully<br />";
         }

// sql to create table
$sql = "CREATE TABLE User (
id INT AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
password VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($link->query($sql) === TRUE) {
    echo "Table User created successfully";
} else {
    echo "Error creating table: " . $link->error;
}

include("closeDB.php");
?>
