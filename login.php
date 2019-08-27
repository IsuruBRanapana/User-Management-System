<?php 
	require_once('inc/connection.php');

	//check form submission
	if (isset($_POST['login'])) {

		//check if the username and password has been entered
		$errors=array();
		if (!isset($_POST['username']) || strlen(trim($_POST['username']))<1) {
			//invalid username
			$errors[]='Username is missing / invalid';
		}

		if (!isset($_POST['password'])||strlen(trim($_POST['password']))<1) {
			//invalid password
			$errors[]='Password is missing / invalid';
		}

		//check if there are any errors in the form
		if (empty($errors)) {

			//save username and password into variabless
			$username=mysqli_real_escape_string($connection,$_POST['username']);
			$passwrd=mysqli_real_escape_string($connection,$_POST['password']);
			$password=sha1($passwrd);

			//prepare a database query
			$query="SELECT * FROM user 
					WHERE email='{$email}' 
					AND password='{$password}' LIMIT 1";
			//check if the user is valid
			//redirect to users
			//if not, display error
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="login.php" method="post">
		Username : <input type="text" name="username" placeholder="E-mail"><br>
		Password : <input type="password" name="password" placeholder="Password"><br>
		<input type="submit" name="login" value="Log In"><br>
	</form>
</body>
</html>
<?php mysqli_close($connection); ?>