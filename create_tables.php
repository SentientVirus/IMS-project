<?php
include("connect_f2fd.php");

$sql = "DROP TABLE if exists Users";

         if(mysqli_query($link, $sql)) {
            echo "Table Users is deleted successfully<br />";
         } else {
            echo "Table Users is not deleted successfully<br />";
         }

// sql to create table
$sql = "CREATE TABLE Users (
id INT AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(30) NOT NULL,
country VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($link->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table Users: " . $link->error;
}

// ----------------------------------------------------------------------------
// create the table of Traits
$sql = "DROP TABLE if exists Traits";

         if(mysqli_query($link, $sql)) {
            echo "Table Traits is deleted successfully<br />";
         } else {
            echo "Table Traits is not deleted successfully<br />";
         }

// sql to create table
$sql = "CREATE TABLE Traits (
id INT AUTO_INCREMENT PRIMARY KEY,
question VARCHAR(128) NOT NULL,
)";

if ($link->query($sql) === TRUE) {
    echo "Table Traits created successfully";
} else {
    echo "Error creating table Traits: " . $link->error;
}

// ----------------------------------------------------------------------------
// create the table of Correlations
$sql = "DROP TABLE if exists Correlations";

         if(mysqli_query($link, $sql)) {
            echo "Table Correlations is deleted successfully<br />";
         } else {
            echo "Table Correlations is not deleted successfully<br />";
         }

// sql to create table
$sql = "CREATE TABLE Correlations (
trait_id INT(32) NOT NULL,
disease_id INT(32) NOT NULL,
rg FLOAT NOT NULL,
FOREIGN KEY (trait_id) REFERENCES Traits(id),
FOREIGN KEY (disease_id) REFERENCES Diseases(id)
)";

if ($link->query($sql) === TRUE) {
    echo "Table Correlations created successfully";
} else {
    echo "Error creating table Correlations: " . $link->error;
}


// ----------------------------------------------------------------------------
// create the table of Diseases
$sql = "DROP TABLE if exists Diseases";

         if(mysqli_query($link, $sql)) {
            echo "Table Diseases is deleted successfully<br />";
         } else {
            echo "Table Diseases is not deleted successfully<br />";
         }

// sql to create table
$sql = "CREATE TABLE Diseases (
  id INT(32) AUTO_INCREMENT PRIMARY KEY,
  disease_name VARCHAR(128) NOT NULL,
  description TEXT
)";

if ($link->query($sql) === TRUE) {
    echo "Table Diseases created successfully";
} else {
    echo "Error creating table Diseases: " . $link->error;
}

// ----------------------------------------------------------------------------
// create the table of Answers
$sql = "DROP TABLE if exists Answers";

         if(mysqli_query($link, $sql)) {
            echo "Table Answers is deleted successfully<br />";
         } else {
            echo "Table Answers is not deleted successfully<br />";
         }

// sql to create table
$sql = "CREATE TABLE Answers (
  user_id INT(32) NOT NULL,
  trait_id INT(32) NOT NULL,
  answer BOOLEAN NOT NULL,
  FOREIGN KEY (trait_id) REFERENCES Traits(id),
  FOREIGN KEY (user_id) REFERENCES Users(id)
)";

if ($link->query($sql) === TRUE) {
    echo "Table Answers created successfully";
} else {
    echo "Error creating table Answers: " . $link->error;
}

// ----------------------------------------------------------------------------
// create the table of Results
$sql = "DROP TABLE if exists Results";

         if(mysqli_query($link, $sql)) {
            echo "Table Results is deleted successfully<br />";
         } else {
            echo "Table Results is not deleted successfully<br />";
         }

// sql to create table
$sql = "CREATE TABLE Results (
  user_id INT(32) NOT NULL,
  disease_id INT(32) NOT NULL,
  result FLOAT NOT NULL,
  FOREIGN KEY (trait_id) REFERENCES Traits(id),
  FOREIGN KEY (disease_id) REFERENCES Diseases(id)
)";

if ($link->query($sql) === TRUE) {
    echo "Table Results created successfully";
} else {
    echo "Error creating table Results: " . $link->error;
}

include("closeDB.php");
?>
