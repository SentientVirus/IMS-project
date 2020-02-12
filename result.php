<?php
include("connectDB.php");
//1. Receive the result from questionnaire.php
//1. Calculate the result from the questionnaire.php
//2. HTML page showing the results
$result = $link -> query("select disease_name, Traits.id, question, rg
from Diseases, Traits, Correlations
where Diseases.id = disease_id and Traits.id = trait_id and disease_name = 'Depression';");
$length = mysqli_num_rows($result);
$max_score = 0;
foreach ($result as $row) {
  $max_score += $row["rg"];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your Result!</title>
  </head>

  <style media="screen">
    body {text-align: center;}
  </style>

  <body>
    <h2>Hi there!</h2>
    <?php
    $score = 0;
    for($i = 0; $i < $length; $i++) {
      if ($_POST["Q".$i] == "Yes"){
        $query4RG = mysqli_query($link,"select rg from Correlations
        where trait_id = {$i} and disease_id = 1;");
        foreach ($query4RG as $row) {
          $score += $row["rg"];
        }
      }
    }
    echo "Your absolute depression-score is:".$score;
    $rel_score = $score*100/$max_score;
    if ($rel_score <= 50) {
      echo "<br><hr><br>Your mental health is good as FUCK!!! Enjoy your life and rock on!";
    } else {
      $compare_to_50 = round(($rel_score-50)*2, 2);
      echo "<br><hr><br>You are {$compare_to_50}% more likely to develop
      depression in the rest of your life than normal people.<br>Congratulations!";

    }





    /*
    $score = 0;
    for($i = 1; $i < $length + 1; $i++) {
      if ($_POST["Q".$i] == "Yes"){
        $rg = mysqli_query($link,"select rg from Correlations
        where disease_id = 1 and trait_id = ".$i." ;");
        $score += $rg;
    }
    echo $score; */

    include("connectDB.php");

    ?>




  </body>

</html>
