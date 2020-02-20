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
	<?php
			//This redirects to the index if you try to login while already logged in
			if (isset($_SESSION['user_id'])){
				header("Location: index.php");
			}
	 ?>
	<div class = "header">
			<img src="f2fd_logo.png" alt="F2FD" id="logo"/>
			<h1 id="headerh1">Phenotype to Phenotype Diagnosis</h1>
	</div>
</head>
		<body style = "height: 100%;">
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
		<form class = "table" action="check_login.php" method="POST" style="width:50%; margin:auto;
		margin-top:10%; display: flex;">
			<div>
				<h1>Login</h1>
				<hr style = "border: 0; height: 1px; background: #333;
				background-image: linear-gradient(to right, #ccc, #333, #ccc);">
				<br>
				<label><b>Email or Username:</b></label>
				<input type="text" placeholder="Enter email or username" name="email/username" required><br><br>
				<label><b>Password:</b></label>
				<input type="password" placeholder="Enter password" name="password" required><br><br>

				<div>
<!-- 				 This link needs to be changed to a hompage where you are already logged in -->
					<button class = "btn btn1" type="submit" style = "width:150px;"
					formnovalidate formaction="index.php">Cancel</button>
					<button class = "btn btn1" type="submit" style = "width:150px;">Login</button>
				<br />

				<p>Not registered? Register <a href="register.php" style="color:dodgerblue">here</a></p>
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
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
	</body>
</html>
