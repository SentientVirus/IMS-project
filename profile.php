<?php
session_start();
?>
<!DOCTYPE html>
 <html>
 <head>
   <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="indexcss.css">
   <title>Profile page</title>
   <script src="https://kit.fontawesome.com/d0932f2606.js" crossorigin="anonymous"></script>
   <script>
           // Function to check whether both passwords are equal.
           function checkPassword(form) {
               password3 = form.new_password.value;
               password4 = form.confirmpassword.value;

               // If password not entered
               if (password3 == '')
                   alert ("Please enter Password");

               // If confirm password not entered
               else if (password4 == '')
                   alert ("Please enter confirm password");

               // If Not same return False.
               else if (password3 != password4) {
                   alert ("\nPassword did not match: Please try again...")
                   return false;
               }

               // If same return True.
               else{
                   return true;
               }
           }
       </script>
       <div class = "header">
           <img src="f2fd_logo.png" alt="F2FD"
              id="logo"/>
           <h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
       </div>
</head>
<body>
  <br>
  <div class="navbar" style = "margin-top:-18px;">
    <a href="index.php">Home</a>
    <div class="dropdown">
      <button class="dropbtn">Tests
      </button>
      <div class="dropdown-content">
        <a href="questionnaire.php">Depression</a>
        <a href="#">Illness2</a></div></div>
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
    <a class="active" href="profile.php"> Profile</a>
  </div>
  <div class = "big_table" style = "text-align:center; margin: auto; width: 80%;">
  <h1>PERSONAL INFORMATION:</h1><br /></br >
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
   <form class = "table" style = "margin:auto; width: 50%;"
   onSubmit = "return checkPassword(this)" action="update_password.php" method="POST" >
      <h1>Change password</h1>
      <p>Please fill in the following fields:</p>
      <hr style = "border: 0; height: 1px; background: #333;
      background-image: linear-gradient(to right, #ccc, #333, #ccc);">

      <label><b>Old password:</b></label>
      <input type="password" placeholder="Enter password" name="old_password" id="old_password" required><br>
      <br />
      <label><b>New password:</b></label>
      <input 	type="password" placeholder="Enter password" name="new_password" id="new_password"
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
          title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
          required><br>
          <br />
      <label><b>Confirm password:</b></label>
      <input type="password" placeholder="Confirm password" name="confirmpassword" id="confirmpassword" required><br>

          <script> // check the complexity of password
            var myInput = document.getElementById("password");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            // When the user clicks on the password field, show the message
            myInput.onfocus = function() {
              document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message
            myInput.onblur = function() {
              document.getElementById("message").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function() {
              // Validate lowercase letters
              var lowerCaseLetters = /[a-z]/g;
              if(myInput.value.match(lowerCaseLetters)) {
              letter.classList.remove("invalid");
              letter.classList.add("valid");
              } else {
              letter.classList.remove("valid");
              letter.classList.add("invalid");
            }

              // Validate capital letters
              var upperCaseLetters = /[A-Z]/g;
              if(myInput.value.match(upperCaseLetters)) {
              capital.classList.remove("invalid");
              capital.classList.add("valid");
              } else {
              capital.classList.remove("valid");
              capital.classList.add("invalid");
              }

              // Validate numbers
              var numbers = /[0-9]/g;
              if(myInput.value.match(numbers)) {
              number.classList.remove("invalid");
              number.classList.add("valid");
              } else {
              number.classList.remove("valid");
              number.classList.add("invalid");
              }

              // Validate length
              if(myInput.value.length >= 8) {
              length.classList.remove("invalid");
              length.classList.add("valid");
              } else {
              length.classList.remove("valid");
              length.classList.add("invalid");
              }
            }
          </script>
          <br />

    <button class = "btn btn1" type="submit"
    style = "display:inline; width: 150px; margin-left: 15%;">Save changes</button>
    <?php
      if (isset($_SESSION['error1'])) {
          $errormsg = $_SESSION['error1'];
          echo $errormsg;
          unset($_SESSION['error1']);
      }

    ?>
  </form>
    <br />
    <form class = "table" style = "margin:auto; width: 50%;" action="update_username.php" method="POST" >
       <h1>Change username</h1>
       <p>Please fill in the following fields:</p>
       <hr style = "border: 0; height: 1px; background: #333;
       background-image: linear-gradient(to right, #ccc, #333, #ccc);">

       <label><b>Password:</b></label>
       <input type="password" placeholder="Enter password" name="old_password" id="old_password" required><br>
       <br />
       <label><b>User name:</b></label>
       <input type="text" placeholder="Enter username" name="new_username" id="new_username" required><br><br>

     <button class = "btn btn1" type="submit"
     style = "display:inline; width: 150px; margin-left: 15%;">Save changes</button>
     <?php
       if (isset($_SESSION['error2'])) {
           $errormsg = $_SESSION['error2'];
           echo $errormsg;
           unset($_SESSION['error2']);
       }

     ?>
   </form>
     <br />
     <form class = "table" style = "margin:auto; width: 50%;" action="update_email.php" method="POST" >
        <h1>Change email</h1>
        <p>Please fill in the following fields:</p>
        <hr style = "border: 0; height: 1px; background: #333;
        background-image: linear-gradient(to right, #ccc, #333, #ccc);">

        <label><b>Password:</b></label>
        <input type="password" placeholder="Enter password" name="old_password" id="old_password" required><br>
        <br />
        <label><b>Email:</b></label>
        <input type="email" placeholder="Enter Email" name="new_email" id="new_email" required><br><br>

      <button class = "btn btn1" type="submit"
      style = "display:inline; width: 150px; margin-left: 15%;">Save changes</button>
      <?php
        if (isset($_SESSION['error3'])) {
            $errormsg = $_SESSION['error3'];
            echo $errormsg;
            unset($_SESSION['error3']);
        }

      ?>
    </form>

      <!-- this line need to be changed to a link with terms of agreement -->
      <div>
        <!-- Later: "please varify your email"  -->
      <br />
      </div>
    </div>
</body>
</html>
