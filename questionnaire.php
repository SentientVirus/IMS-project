<?php
include("connectDB.php");
//1. Receive the Disease name from index.php.
//2. Query out the questions that have the D_id chosen by user_id
//3. Generate html page showing the questions and let the user answer the questions
//4. Pass the answer to the result.php

$result = mysqli_query($link, "select disease_name, Traits.id, question, rg
from Diseases, Traits, Correlations
Where Diseases.id = disease_id and Traits.id = trait_id and disease_name = 'Depression';");
if (mysqli_num_rows($result) == 0) {
    print("No results matching your query<br>\n");
} else {
    echo "<table border='1'>"; //define an html table
    //<th> Defines a header cell in a table
    //<tr> Defines a row in a table
    //<td> Defines a cell in a table
    echo "<tr><th>Disease Name</th><th>Question:</th></tr>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<tr><td>";
        echo $row[0];
        echo "</td><td>";
        echo $row[1];
        echo "</td></tr>";
    }
    echo "</table>";
    include("disconnectDB.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Questions of your life</title>
  </head>
  <body>
    <div class="header"><h2>Survey of Depression</h2></div>
    <div class="wrapContent">
        <div class="sideNavigator">
          <ul>
            <li><a href="#"> Survey 1 </a></li>
            <li><a href="#"> Survey 2 </a></li>
          </ul>
        </div>

        <div class="content">
          <h2>Survey Name</h2>
          <h3>Question 1</h3>
          <form action="index.html" method="post">
            <input type="text" name="answer" size="30">
            <input type="submit" name="submit" value="Submit">
            <input type="hidden" name="questionid" value="questionid">
            <input type="hidden" name="submitted" value="1">
            <br><input type="radio" name="gender" value="yes">Yes<br>
            <input type="radio" name="gender" value="no">No<br>

          </form>
        </div>
  </div>



  </body>
</html>
