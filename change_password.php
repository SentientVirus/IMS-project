<?php
	session_start();
?>
<!doctype html>
<html >
	<head>
		<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="indexcss.css">
		<title>F2FD</title>
		<div class = "header">
				<img src="f2fd_logo.png" alt="F2FD"
					 id="logo"/>
				<h1 id="headerh1">Phenotype to Phenotype Prediction</h1>
		</div>
	</head>
	<body>
			<div id="main" style = "margin:auto;">
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

    	<div class="table" style = "width:50%; text-align: left; margin: auto; margin-top: 5%;">
			<form action="change_password.php" method="POST" >
				<div style= 'text-align: center;'>
					<?php
						if (isset($_SESSION['message'])) {
							$message = $_SESSION['message'];
							echo $message;
							unset($_SESSION['message']);
						}
					?>
				</div>
				<h1>Change password</h1>
				<p>Enter your user account's verified email and we will send you a password reset link</p>
				<hr style = "border: 0; height: 1px; background: #333;
				background-image: linear-gradient(to right, #ccc, #333, #ccc);">

				<label><b>Email:</b></label>
				<input type="email" placeholder="Enter Email" name="email" id="email" required><br><br>
				<div>
					<button class = "btn btn1" type="submit" style = "width:150px;"
					formnovalidate formaction="index.php">Cancel</button>
					<button class = "btn btn1" type="submit" style = "width:150px;">Send</button>
				</div>
			</form>
	</body>
</html>
