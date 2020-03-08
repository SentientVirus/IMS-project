<?php
	session_start();
	include("connectDB.php");
	$D_names = mysqli_query($link,"SELECT disease_name FROM Diseases;");
$disease_chosen = $_SESSION['choice'];

$query_4_Tid = mysqli_query($link,"SELECT trait_id FROM Correlations, Diseases
  WHERE id = disease_id and disease_name = '{$disease_chosen}' order by trait_id asc LIMIT 1;");
  foreach ($query_4_Tid as $key) {
    $trait_1_id = $key["trait_id"];
  }
$query_4_Did = mysqli_query($link,"SELECT id FROM Diseases WHERE disease_name = '{$disease_chosen}';");
  foreach ($query_4_Did as $key) {
    $Disease_id = $key["id"];
  }

//1. Receive the result from questionnaire.php
//1. Calculate the result from the questionnaire.php
//2. HTML page showing the results
$result = mysqli_query($link,"SELECT disease_name, Traits.id, question, rg
from Diseases, Traits, Correlations
where Diseases.id = disease_id and Traits.id = trait_id and disease_name = '{$disease_chosen}'
order by Traits.id;");
$min_score = 0;
$max_score = 0;
foreach ($result as $row) {
  if ($row["rg"] >= 0) {
    $max_score += $row["rg"];
  }
  else {
    $min_score += $row["rg"];
  }
}
$span = $max_score - $min_score;

$length = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
    hr {border: 0; height: 1px; background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);}
    </style>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="indexcss.css">
    <title>Your result!</title>
    <div class = "header">
        <img src="f2fd_logo.png" alt="F2FD" id="logo"/>
        <h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
    </div>
  </head>

  <style media="screen">
    body {text-align: center;}
  </style>

  <body>
    <br>
    <div class="navbar" style = "margin-top:-18px;">
      <a href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn" style = "background-color: #D9181D;">Tests
        </button>
        <div class="dropdown-content">
          <?php
          foreach ($D_names as $row) {
            $disease = $row["disease_name"];
            echo "<a href='questionnaire.php?choice=".$disease."'> ".$disease." </a>";
          }
          ?>
				</div></div>
          <?php
          if (isset($_SESSION['user_id'])){
          echo '<div class="dropdown">
          <a href="logout.php" class="dropbtn" onclick = "session_destroy();">Logout</a></div>';
          }
          else {
          echo '<div class="dropdown"><button class="dropbtn">Login</button>
          <div class="dropdown-content">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a></div></div>';}
            ?>
      <a href="profile.php"> Profile</a>
      <div style = "float: right; margin-left: 10%;">
      <a href="profile.php" style = "color: white;"><?php
          if (isset($_SESSION['username']))
          {$user_name = $_SESSION['username'];
            echo "Welcome, $user_name";
          }
      ?></a></div></div>
    </div>
    <div class = "table" style = "width: 50%; margin: auto; text-align: center;
    margin-top: 10%;">
    <h1>Hi there!</h1>
    <br>
    <?php
    $score = 0;
    for($i = 1; $i < $length + 1; $i++) {
      if ($_POST["Q".$i] == "Yes"){
        $j = $i + $trait_1_id - 1;
        $query4RG = mysqli_query($link,"SELECT rg from Correlations where trait_id = {$j} LIMIT 1;");
        foreach ($query4RG as $row) {
          $score += $row["rg"];
					echo $row["rg"];
        }
      }
    }


    //echo "Your absolute depression score is: ".$score;
		echo $score;
      $rel_score = ($score - $min_score)*100/$span;
      ?>
      <?php
    if ($rel_score <= 50) {
      echo "<br><hr><br>Your health is pretty good!! Enjoy your life and rock on!";
    } else {
      $compare_to_50 = round(($rel_score-50)*2, 2);
      echo "<br><hr><br>You are {$compare_to_50}% more likely to develop {$disease_chosen} in the rest of your life than normal people.";
      $description = mysqli_query($link, "SELECT description FROM Diseases where disease_name = '{$disease_chosen}';");
      foreach ($description as $key) {
        echo "<br>".$key["description"];
      }


    }

    if (isset($_SESSION['user_id'])) {
      // make the home page post to this page with $_POST["disease_chosen"]
      $query = "INSERT INTO Results (user_id, disease_id, result) VALUES ({$_SESSION['user_id']}, {$Disease_id},{$rel_score})";
      $save_result = mysqli_query($link, $query);

    }




    include("disconnectDB.php");

    ?>
  </div>
  <br></br>
  <br></br>
  <br></br>
  <br></br>
  <br></br>
  <br></br>
  <br></br>
  <br></br>



  </body>

</html>
