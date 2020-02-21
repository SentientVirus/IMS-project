<?php
	session_start();
?>
	<?php
	include 'connectDB.php';
	// Get values from user input in html register.php
	$new_password = $_POST["new_password"];
	$old_password = $_POST["old_password"];
	$id = $_SESSION["user_id"];
	
	// To avoid SQL Injection
	$old_password = mysqli_real_escape_string($link, $old_password);

	//hash password
	$options = array("cost"=>4);
	$hashPassword = password_hash($old_password,PASSWORD_BCRYPT,$options);

	$query = "select * from users where id = '".$id."'";
	$rs = mysqli_query($link, $query);
	$numRows = mysqli_num_rows($rs);

	$new_password = mysqli_real_escape_string($link, $new_password);
	$hashNewPassword = password_hash($new_password,PASSWORD_BCRYPT,$options);


	if($numRows  == 1) {
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($old_password, $row['password'])){
			echo "Password verified";
			// this needs to be changed to a hompage where you are already logged in
			//header('Location: index.php');
			$query = "UPDATE users
			SET password = '$hashNewPassword'
			WHERE id = '$id'";

			mysqli_query($link, $query);
		}
		else {
			$_SESSION['error'] = "<p style = 'color:red;'><b>Wrong password</b></p>";
		}
	}
		include 'disconnectDB.php';
		header('Location: pro.php');

		//header('Location: login.php');


// Can also write query like this
// $query = sprintf("INSERT INTO Users (username, email, password) VALUES ('%s', '%s', '%s')",
// 				mysql_real_escape_string($link, $username),
// 				mysql_real_escape_string($link, $email),
// 				mysql_real_escape_string($link, $hashPassword));
// mysqli_query($link, $query);

// // To avoid SQL Injection with PDO(can not get it to work yet)
// $query = $dbh->prepare("INSERT INTO Users (username, email, password) VALUES (':username', ':email', ':hashPassword')");
// $query->bindParam(':username', $username);
// $query->bindParam(':email', $email);
// $query->bindParam(':password', $hashPassword);
// $query->execute();
// mysqli_query($link, $query);

?>
