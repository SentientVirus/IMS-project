<?php
include("connectDB.php");
$result = mysqli_query($link,"select disease_name, Traits.id, question, rg
from Diseases, Traits, Correlations
where Diseases.id = disease_id and Traits.id = trait_id and disease_name = 'Depression';");

for($i = 0; $i < mysqli_num_rows($result) + 1; $i++) {
     ${"result$i"} = mysqli_query($link,"select disease_name, Traits.id, question, rg
     from Diseases, Traits, Correlations
     where Diseases.id = disease_id and Traits.id = trait_id and disease_name = 'Depression'
     LIMIT ".$i.",1;");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="indexcss.css">
    <title>Auto Generated Questions</title>
    <div class = "header">
        <img src="f2fd_logo.png" alt="F2FD"
           style="width: 150px; height: 150px; margin-left: 80px" id="logo"/>
        <h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
    </div>
  </head>
  <body style = "height: 250%;">
    <div class="navbar" style = "margin-top:-18px;">
      <a href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn" style = "background-color: #D9181D;">Tests
        </button>
        <div class="dropdown-content">
          <a href="questionnaire.php">Depression</a>
          <a href="#">Illness2</a></div></div>
          <div class="dropdown">
            <button class="dropbtn">Login
            </button>
            <div class="dropdown-content">
              <a href="login.php">Login</a>
              <a href="register.php">Register</a></div></div>
      <a href="pro.php"> Profile</a>
    </div>
    <table class = "table1" border='0'>

      <form name="Depression" action="result.php" method="post" target="_self">
        <tr><th style = "width: 60%;">Question</th><th style = "width: 40%;">Please choose:</th></tr>
          <?php
          $j = 1;
            for ($i= 0; $i < mysqli_num_rows($result); $i++) {
              $arr = mysqli_fetch_row(${"result$i"});
              ?>
              <tr><td>
              <?php echo $arr[2]; ?>
              </td><td>
              <input type="radio" value="Yes" name="<?php echo "Q".$j ?>"  checked> Yes <p>
              <input type="radio" value="No" name="<?php echo "Q".$j ?>" >No<p>
              </td></tr>
              <?php
              $j++;
            }
           ?>
        <tr><td><input class = "btn btn1" type="submit" value="Submit" name="Submit"
          style = "width: 20%;"></td></tr>
      </form>
    </table>
    <div id="radioResults"></div>



    <script type="text/javascript">
      function loopForm(form) {
        var radioResults = 'Radio buttons: ';
        for (var i = 1; i < form.elements.length; i++ ) {
            if (form.elements[i].type == 'radio') {
                if (form.elements[i]. == true) {
                    radioResults += form.elements[i].value + ' ';
                }
            }
        }
        document.getElementById("radioResults").innerHTML = radioResults;
    }
    </script>


  </body>
</html>
