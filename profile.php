<?php
session_start();
?>
<!DOCTYPE html>
 <html>
 <head>
   <title>F2FD:</title>
</head>
<body>
  <h2>PERSONAL INFORMATION:</h2><br /></br >
  <?php
      if (isset($_SESSION['user_id'])){
        include("connectDB.php");
        //mysql_select_db("users") or die("could not able to connect");
        $result = mysqli_query($link,"select * from users WHERE id = '".$_SESSION["user_id"]."'");
      }
      else {
        $_SESSION['error'] = "<p style = 'color:red;'><b>You need to log in in order to see this page!</b></p>";
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
      ?>
      <label><br>Change Username:</label>
      <input type="Username" placeholder="New Username" name="Username" id="Username" required><br></br>
      <br><button type="button" onclick="alert('Your details are updated')">Submit</button>
      <div>
        <?php
        if(isset( $_SESSION['submit'] )){
          $SQL = "INSERT INTO Users (username) VALUES ($username)";
          $result = mysqli_query($SQL);
        }?>
        <?php
      echo("<br>Score: "); echo($Score);
      ?>
    </div>
    <?php
      echo("<br>email: "); echo($email);
      ?>
      <label><br>Change Email:</label>
      <input type="email" placeholder="New email" name="email" id="email" required><br></br>
      <br><button type="button" onclick="alert('Your details are updated')">Submit</button>
      <div>
      <?php
      if(isset( $_SESSION['submit'] )){
        $SQL = "INSERT INTO Users (email) VALUES ($email)";
        $result = mysqli_query($SQL);
      }?>
     <!-- Password field -->
  <br>Old Password:<br><input type="password" value="Type password" id="myInput"></br><!-- An element to toggle between password visibility -->
  <br>New Password:<br><input type="password" value="Type password" id="myInput"></br><!-- An element to toggle between password visibility -->
  <input type="checkbox" onclick="myFunction()"> show password</br>

  <br><button type="button" onclick="alert('Your details are updated')">Submit</button>
  <?php
      if(isset( $_SESSION['submit'] )){
        $SQL = "INSERT INTO Users (password) VALUES ($password)";
             $result = mysqli_query($SQL);
        }?>
</div>
     </form>
</body>
</html>
