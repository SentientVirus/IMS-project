<?php
SESSION_start();
?>
?>
<!DOCTYPE html>
<html>
    <head>
        <header>
            <h1 id="headerh1"> PROFILE PAGE </h1>
        </header>
    </head>
    <body>
      <table align = "centre" border="1px" style="width:600px; line-height:40px">
          <?php
          if (isset($_SESSION['error']))
           { $errormsg = $_SESSION['error'];
             unset($_SESSION['error']);
             echo'<p<strong>$Re-direct to login page</strong><br/></p>';
           }
           ?>
       <?php
       include("connectDB.php");
       $result = mysqli_query($link,"select * from Users WHERE id = $_SESSION["user_id"]");
       $row = mysqli_fetch_assoc($result);
       if (mysqli_num_rows($result) == 0) {
         print("No results matching your query<br>/n");
       } else {
         echo"<table border = '1'>";      //define htmlentities
                                         //<th> Defines a header cell in a table
                                        //  //<tr> Defines a row in a table
                                       //<td> Defines a cell in a table

       echo "<tr><th>username</th><th>Details</th></tr>";
       while($row = mysqli_fetch_row($result)){
       echo "<tr><td>";
       echo $row[0];
       echo "</td><td>";
       echo $row[1];
       echo "</td></tr>"; }
       echo "</table>";
      include("disconnectDB.php");
    }?>
       <h2>SEARCH FOR A USER:</h2><br /></br >
     <form action="pro.php" method="GET">
         <tr><td>Username:<td><td><input type="text" id ="username" name="username"></td></tr>
         <tr><td><input type="submit" id="submit" value="View Profile!"></td></tr>
         <tr><td><input type="submit" id="submit" value="Add"></td></tr>

  <?php
     $username = $_SESSION["username"];
     $id = $_SESSION["id"];
     $email = $_SESSION ['email'];
     $password = $_SESSION['password'];
     print("enetered username,id,email and password");
     //put the information into database
  ?>
       </table>
     </form>
</body>
</html>
