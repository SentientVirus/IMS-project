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
      echo "<br>".$C_D_id;
    $query2 = mysqli_query($link,"SELECT id FROM Traits ORDER BY id DESC LIMIT 1;") ;
      foreach ($query2 as $row) {
        $T_id = $row["id"] + 1;
      }
      echo "<br>".$T_id;


  mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);
  //transaction begins, nothing is solid until we commit changes or rollback to here.

  $query1 = mysqli_query($link, "INSERT INTO Traits (id, question) VALUES ({$T_id}, \"{$T_name}\");");
  $query2 = mysqli_query($link, "INSERT INTO Correlations (trait_id, disease_id, rg) VALUES ({$T_id}, {$C_D_id}, {$C_rg});");

  if ($query1 and $query2) {
    mysqli_commit($link);
    // if both querys are carried out successfully, then we commit this transaction.
    echo "<br>Correlation data inserted successfully";
  }else {
    // if not, then we will abort the changes, and rollback to the beginning of the transaction.
    mysqli_rollback($link);
    echo "<br>!!Failure!!<br>Failed to insert into Correlations table";
  }


}


else {
  echo "your input is wrong";
}

include("disconnectDB.php");

 ?>
