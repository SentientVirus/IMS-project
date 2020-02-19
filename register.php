<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="indexcss.css">
		<title>F2FD</title>
		<div class = "header">
				<img src="f2fd_logo.png" alt="F2FD"
					 id="logo"/>
				<h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
		</div>
	<!-- Get refrech button for captcha -->
	<script src="https://kit.fontawesome.com/d0932f2606.js" crossorigin="anonymous"></script>

		<script>
            // Function to check whether both passwords are equal.
            function checkPassword(form) {
                password1 = form.password.value;
                password2 = form.confirmpassword.value;

                // If password not entered
                if (password1 == '')
                    alert ("Please enter Password");

                // If confirm password not entered
                else if (password2 == '')
                    alert ("Please enter confirm password");

                // If Not same return False.
                else if (password1 != password2) {
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

<!-- feel free to change this css code so it matches the homepage -->
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			/* Style all input fields */
			input {
			  width: 100%;
			  padding: 12px;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  box-sizing: border-box;
			  margin-top: 6px;
			  margin-bottom: 16px;
			}

			/* Style the submit button */
			input[type=submit] {
			  background-color: #4CAF50;
			  color: white;
			}

			/* Style the container for inputs */
			.container {
			  background-color: #f1f1f1;
			  padding: 20px;
			}

			/* The message box is shown when the user clicks on the password field */
			#message {
			  display:none;
			  background: #f1f1f1;
			  color: #000;
			  position: relative;
			  padding: 20px;
			  margin-top: 10px;
			}

			#message p {
			  padding: 10px 35px;
			  font-size: 18px;
			}

			/* Add a green text color and a checkmark when the requirements are right */
			.valid {
			  color: green;
			}

			.valid:before {
			  position: relative;
			  left: -35px;
			  content: "✔";
			}

			/* Add a red text color and an "x" when the requirements are wrong */
			.invalid {
			  color: red;
			}

			.invalid:before {
			  position: relative;
			  left: -35px;
			  content: "✖";
			}
		</style>
	</head>

    <body>
			<div id="main" style = "margin:auto;">
					<?php
							if (isset($_SESSION['error']))
							{ $errormsg = $_SESSION['error'];
							 unset($_SESSION['error']);
							 echo '<p <strong> $errormsg </strong><br/></p>';
							}
					?>
					<br>
					<div class="navbar" style = "margin-top:-18px;">
						<a href="index.php">Home</a>
						<div class="dropdown">
							<button class="dropbtn">Tests
							</button>
							<div class="dropdown-content">
								<a href="questionnaire.php">Depression</a>
								<a href="#">Illness2</a></div></div>
								<div class="dropdown">
									<button class="dropbtn" style = "background-color: #D9181D;">Login
									</button>
									<div class="dropdown-content">
										<a href="login.php">Login</a>
										<a href="register.php">Register</a></div></div>
						<a href="profile.php"> Profile</a>
					</div>

    	<div class="table" style = "width:50%; text-align: left; margin: auto;
			margin-top: 5%;">
			<form onSubmit = "return checkPassword(this)" action="add_user.php" method="POST" >
				<h1>Register</h1>
				<p>Please fill in the following fields to register:</p>
				<hr style = "border: 0; height: 1px; background: #333;
				background-image: linear-gradient(to right, #ccc, #333, #ccc);">

				<label><b>Email:</b></label>
				<input type="email" placeholder="Enter Email" name="email" id="email" required><br><br>

				<label><b>User name:</b></label>
				<input type="text" placeholder="Enter username" name="username" id="username" required><br><br>

				<label><b>Password:</b></label>
				<input 	type="password" placeholder="Enter password" name="password" id="password"
						pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
						title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
						required><br><br>

				<label><b>Confirm password:</b></label>
				<input type="password" placeholder="Confirm password" name="confirmpassword" id="confirmpassword" required><br><br>

				<label><b>Enter the text below:</b></label>
                <input id="captcha" placeholder="Enter captcha "name="captchacode" type="text">
                <img src="captcha.php" alt="CAPTCHA" class="captcha-image" style="margin-top: 20px"/>
                <i class="fas fa-redo refresh-captcha fa-2x" style = "cursor: pointer;"></i><br>
                <br>
                <script type="text/javascript">
                    var refreshButton = document.querySelector(".refresh-captcha");
                    refreshButton.onclick = function() {
                        document.querySelector(".captcha-image").src = "captcha.php?" + Date.now();
                    };
                </script>
				<!-- this line need to be changed to a link with terms of agreement -->
				<p>By creating an account you agree to our <a href="terms_and_privacy.php" target = "_blank" style="color:dodgerblue"> Terms & Privacy</a>.</p>

				<div>
					<!-- change this button with CSS so that it looks nice -->
					<!-- if you click here you will go back to homepage -->
					<div style = "text-align:right;">
					<input class = "btn btn1" type="button" value="Cancel"
					formnovalidate onClick="window.location = 'index.php'"
					style = "display: inline; width: 150px;"></button>
					<!-- if you click here you will be registerd and go to loginpage -->
					<button class = "btn btn1" type="submit" style = "display:inline; width: 150px;">Register </button>
				</div>

					<!-- Later: "please varify your email"  -->
				<br />
				<?php
					if (isset($_SESSION['error'])) {
   					 	$errormsg = $_SESSION['error'];
    					echo $errormsg;
   		 				unset($_SESSION['error']);
					}

				?>
				</div>

			</form>

		</div>

		<div id="message">
  			<h4>Password must contain the following:</h4>
  			<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  			<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  			<p id="number" class="invalid">A <b>number</b></p>
  			<p id="length" class="invalid">Minimum <b>8 characters</b></p>
		</div>

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
		<br></br>
		<br></br>
		<br></br>
		<br></br>
	</body>
</html>


<!-- Both <button type="submit"> and <input type="submit"> display as buttons and cause
the form data to be submitted to the server.The difference is that <button> can have content,
whereas <input> cannot (it is a null element). While the button-text of an <input> can be
specified, you cannot add markup to the text or insert a picture. So <button> has a wider
array of display options.There are some problems with <button> on older, non-standard
browsers (such as Internet Explorer 6), but the vast majority of users today will not encounter them. -->
