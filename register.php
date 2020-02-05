<!DOCTYPE html>
<html>
<body>
<form action="/add_user.php" style="border:1px solid #ccc">
<div>
	<h1>Register</h1>
	<p>Please fill in the following fields to register:</p>

	<hr>
	<label><b>Email:</b></label>
	<input type="text" placeholder="Enter Email" name="email" required><br><br>

	<label><b>User name:</b></label>
	<input type="text" placeholder="Enter username" name="username" required><br><br>
	
	<label><b>Password:</b></label>
	<input type="password" placeholder="Enter password" name="password" required><br><br>

	<label><b>Confirm password:</b></label>
	<input type="password" placeholder="Confirm password" name="confirmpassword" required><br><br>

	<!-- this line need to be changed to a link with terms of agreement -->
	<p>By creating an account you agree to our <a href="linktotermsandprivacypage.html" style="color:dodgerblue">Terms & Privacy</a>.</p>

	<div>
		<!-- if you click here you will go back to homepage -->
		<button type="submit" formnovalidate formaction="http://localhost:8888/homepage.php">Cancel</button>
		<!-- if you click here you will be registerd and go to loginpage -->
		<button type="submit">Register </button>
	</div>
</div>
</form>
</body>
</html>


<!-- Both <button type="submit"> and <input type="submit"> display as buttons and cause 
the form data to be submitted to the server.The difference is that <button> can have content, 
whereas <input> cannot (it is a null element). While the button-text of an <input> can be 
specified, you cannot add markup to the text or insert a picture. So <button> has a wider 
array of display options.There are some problems with <button> on older, non-standard 
browsers (such as Internet Explorer 6), but the vast majority of users today will not encounter them. -->