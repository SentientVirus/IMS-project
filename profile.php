<?php
session_start();
?>
<!DOCTYPE html>
 <html>
 <head>
   <title>F2FD:</title>
</head>
<body>
  <h2>PROFILE PAGE:</h2><br /></br >

  <?php
      if (isset($_SESSION['user_id'])){
        include("connectDB.php");
        //mysql_select_db("users") or die("could not able to connect");
        $result = mysqli_query($link,"select * from users WHERE id = '".$_SESSION["user_id"]."'");
      }
      else {
        $_SESSION['error'] = "You need to log in in order to see this page!";
        header("Location: login.php");
          //Add session error (check if it exists in the login)
          //Redirect to login
          //echo "Wrong";
        }
        //if(mysql_num_rows($userquery) = 1) {
        //  print("Information");
        //}

      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $username = $row["username"];
        $email = $row["email"];
      //  $password = $row["password"];
      }
   ?>
   <div>
     <?php
      echo("Username: "); echo($username);
      echo("<br>email: "); echo($email);
      //echo("<br>password: "); echo($password);
      ?>
       </table>
     </form>
</body>
</html>
