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

    <form action="insert_data_admin.php" target="_self" method="post">

      Please enter the disease's name:<br>
      <input type="text" id="D_name" name="D_name"><br><br>

      Please enter the disease's description:<br>
      <input type="text" id="D_desc" name="D_desc"><br><br>

      <input type="submit" value="Submit">
    </form>
  </div>

  <br>
  <hr>
  <br>

  <div class="">
    <form action="insert_data_admin.php" target="_self">

      Please enter the question sentence:<br>
      <input type="text" id="T_name" name="T_name"><br><br>

      Please choose the disease's name:<br>
      <input type="text" id="C_D_name" name="C_D_name"><br><br>

      Please enter the correlation between those two (floating value like 0.45512):<br>
      <input type="text" id="C_rg" name="C_rg"><br><br>

      <input type="submit" value="Submit">


    </form>

  </div>



  </body>
</html>
