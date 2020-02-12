<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="indexcss.css">
	<title>Login</title>
	<div class = "header">
			<img src="f2fd_logo.png" alt="F2FD"
				 style="width: 150px; height: 150px; margin-left: 80px" id="logo"/>
			<h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
	</div>
</head>
	<body>
		<body style = "height: 100%;">
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
				<a href="#"> Profile</a>
			</div>
		<form class = "table" action="check_login.php" method="POST" style="width:50%; margin:auto;
		margin-top:10%;">
			<div>
				<h1>Login</h1>
				<hr style = "border: 0; height: 1px; background: #333;
				background-image: linear-gradient(to right, #ccc, #333, #ccc);">
				<br>
				<label><b>Email:</b></label>
				<input type="text" placeholder="Enter Email" name="email" required><br><br>
				<label><b>Password:</b></label>
				<input type="password" placeholder="Enter password" name="password" required><br><br>

				<div>
<!-- 				 This link needs to be changed to a hompage where you are already logged in -->
					<button class = "btn btn1" type="submit" style = "width:35%;"
					formnovalidate formaction="index.php">Cancel</button>
					<button class = "btn btn1" type="submit" style = "width:35%;">Login</button>
				<br />
				<?php
					if (isset($_SESSION['error'])) {
   					 	$errormsg = $_SESSION['error'];
    					echo $errormsg;
   		 				unset($_SESSION['error']);
					}
				?>
				</div>

			</div>
		</form>
	</body>
</html>
