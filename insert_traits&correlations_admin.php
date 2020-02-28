<?php
include("connectDB.php");

if (isset($_POST["T_name"])) {
  $T_name = $_POST["T_name"];

  $C_D_name = $_POST["C_D_name"];

  $C_rg = $_POST["C_rg"];

    $query1 = mysqli_query($link,"SELECT id FROM Diseases WHERE disease_name = \"{$C_D_name}\" LIMIT 1;");
    foreach ($query1 as $row) {
      $C_D_id = $row["id"];
      }

    $query2 = mysqli_query($link,"SELECT id FROM Traits ORDER BY id DESC LIMIT 1;") ;
      foreach ($query2 as $row) {
        $T_id = $row["id"] + 1;
      }


      $query = "INSERT INTO Traits (question) VALUES (\"{$T_name}\");";
        if ($link->query($query) === TRUE) {
            echo "<br>Trait data inserted successfully";
        } else {
            echo "<br>Error inserting Trait data " . $link->error;
          }

      $query = "INSERT INTO Correlations (trait_id, disease_id, rg) VALUES ({$T_id}, {$C_D_id}, {$C_rg});";
        if ($link->query($query) === TRUE) {
            echo "<br>Correlation data inserted successfully";
        } else {
            echo "<br>Error inserting Correlation data " . $link->error;
          }

}


else {
  echo "your input is wrong";
}

include("disconnectDB.php");

 ?>
