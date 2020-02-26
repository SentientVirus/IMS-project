<?php
session_start();
?>
<!DOCTYPE html>
 <html>
 <head>
   <title>F2FD:</title>
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
</head>
<body>
  <h2>PERSONAL INFORMATION:</h2><br /></br >
  <?php
      if (isset($_SESSION['user_id'])){
        include("connectDB.php");
        //mysql_select_db("users") or die("could not able to connect");
        $result = mysqli_query($link,"select * from Users WHERE id = '".$_SESSION["user_id"]."'");
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
   <form onSubmit = "return checkPassword(this)" action="update_password.php" method="POST" >
      <h1>Change password</h1>
      <p>Please fill in the following fields:</p>
      <hr style = "border: 0; height: 1px; background: #333;
      background-image: linear-gradient(to right, #ccc, #333, #ccc);">

      <label><b>Old password:</b></label>
      <input type="password" placeholder="Enter password" name="old_password" id="old_password" required><br>

      <label><b>New password:</b></label>
      <input 	type="password" placeholder="Enter password" name="new_password" id="new_password"
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
          title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
          required><br>
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

    <button class = "btn btn1" type="submit" style = "display:inline; width: 150px;">Save changes</button></form>
    <form action="update_username.php" method="POST" >
       <h1>Change username</h1>
       <p>Please fill in the following fields:</p>
       <hr style = "border: 0; height: 1px; background: #333;
       background-image: linear-gradient(to right, #ccc, #333, #ccc);">

       <label><b>Password:</b></label>
       <input type="password" placeholder="Enter password" name="old_password" id="old_password" required><br>
       <label><b>User name:</b></label>
       <input type="text" placeholder="Enter username" name="new_username" id="new_username" required><br><br>

     <button class = "btn btn1" type="submit" style = "display:inline; width: 150px;">Save changes</button></form>
     <form action="update_email.php" method="POST" >
        <h1>Change email</h1>
        <p>Please fill in the following fields:</p>
        <hr style = "border: 0; height: 1px; background: #333;
        background-image: linear-gradient(to right, #ccc, #333, #ccc);">

        <label><b>Password:</b></label>
        <input type="password" placeholder="Enter password" name="old_password" id="old_password" required><br>
        <label><b>Email:</b></label>
        <input type="email" placeholder="Enter Email" name="new_email" id="new_email" required><br><br>

      <button class = "btn btn1" type="submit" style = "display:inline; width: 150px;">Save changes</button></form>

      <!-- this line need to be changed to a link with terms of agreement -->
      <p>By creating an account you agree to our <a href="terms_and_privacy.php" target = "_blank" style="color:dodgerblue"> Terms & Privacy</a>.</p>

      <div>
        <?php
					if (isset($_SESSION['error1'])) {
   					 	$errormsg = $_SESSION['error1'];
    					echo $errormsg;
   		 				unset($_SESSION['error1']);
					}

				?>
        <!-- Later: "please varify your email"  -->
      <br />
      </div>
</body>
</html>
