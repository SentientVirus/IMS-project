<!DOCTYPE html>
 <html>
 <head>
   <title>Search for a user:</title>
</head>
<body>
  <?php
  include("connectDB.php");
  $result = mysqli_query($link,"select * from users")   or die("Could not issue MySQL query");
  if (mysqli_num_rows($result) == 0) {
     print("No results<br>\n");
  } else {
    echo "<table border='1'>";        // define htmlentities
                                             //<th> define header
                                             //<tr> table_row
                                             //<td> cell in tab
   echo "<tr><th>Book Name</th><th>Published year</th></tr>";
   while($row = mysqli_fetch_row($result)){
     echo "<tr><td>";
     echo $row[0];
     echo "</td><td>";
     echo $row[1];
     echo "</td></tr>"; }
     echo "</table>";
   include 'disconnectDB.php'; }
   ?>
     <h2>SEARCH FOR A USER:</h2><br /></br >
     <form action="pro.php" method="GET">
       <table>
         <tr><td>Username:<td><td><input type="text" id ="username" name="username"></td></tr>
         <tr><td><input type="submit" id="submit" value="View Profile!"></td></tr>
         <tr><td><input type="submit" id="submit" value="Add"></td></tr>

       </table>
     </form>
</body>
</html>
