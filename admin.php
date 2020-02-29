<?php include("connectDB.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin_f2fd</title>
  </head>

  <body>
    <h1>Hi Admin, enjoy your power</h1>
    <!--1. make three uttons with three tables to alter: Diseases, Traits, Correlations.
      2. make them invisible and only visible if the user has chosen them
      3. post the data which the admin inserted to the form and ost to the same page to insert them
    -->
  <div class="">

    <form action="admin_insert_diseases.php" method="post">

      Please enter the disease's name:<br>
      <input type="text" id="D_name" name="D_name" placeholder="Disease's name"><br><br>

      Please enter the disease's description:<br>
      <input type="text" id="D_desc" name="D_desc" placeholder="Short Description"><br><br>

      <input type="submit" value="Submit">
    </form>
  </div>

  <br>
  <hr>
  <br>

  <div class="">
    <form action="admin_insert_traits&correlations.php" method="post" >

      Please enter the question sentence:<br>
      <input type="text" id="T_name" name="T_name" placeholder="Human friendly, plz"><br><br>

      Please choose the disease's name:<br>
      <input type="text" id="C_D_name" name="C_D_name" placeholder="Type a bit and choose"><br><br>

      Please enter the correlation between those two (floating value like 0.45512):<br>
      <input type="text" id="C_rg" name="C_rg" placeholder="A floating number < 1"><br><br>

      <input type="submit" value="Submit">
    </form>
  </div>
    <!--
    <script type="text/javascript">
      var diseases = ["Dpression","Heart-Disease","Diabetes"];
    </script>
  -->






  </body>
</html>
