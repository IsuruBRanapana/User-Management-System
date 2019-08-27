<?php require_once('inc/connection.php') ?>
<?php  
	//check for submition
	if (isset($_POST['login'])) {

		$errors=array();
		//check user name and password
		if (!isset($_POST['email'])||strlen(trim($_POST['email']))<1) {
			$errors[]='Username is missing / invalid';
		}
		if (!isset($_POST['password'])||strlen(trim($_POST['password']))<1) {
			$errors[]='Password is missing / invalid';
		}

		//check if there are any errors in the form
		if (empty($errors)) {
			//assign variables
			$email=mysqli_real_escape_string($connection,$_POST['email']);
			$passwrd=mysqli_real_escape_string($connection,$_POST['password']);
			$password=md5($passwrd);  

			//create query
			$query="SELECT * FROM user WHERE email='{$email}' AND password = '{$password}' LIMIT 1";

			$result_set=mysqli_query($connection,$query);
			if ($result_set) {
				if (mysqli_num_rows($result_set)==1) {
					//valid user
					header('Location: users.php');
				}else{
					$errors[]='Invalid Username / Password';
				}
			}else{
				$errors[]='Database query failed';
			}
		}
	}
?>
<!DOCTYPE html>
<html  lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="login.php" method="post">
		<?php  
			if (isset($errors)&& !empty($errors)) {
				echo "Invalid user";
				print_r($errors);
			}
		?>
		Username : <input type="text" name="email" placeholder="E-mail"><br>
		Password : <input type="password" name="password" placeholder="Password"><br>
		<input type="submit" name="login" value="Log In"><br>
	</form>
</body>
</html>
<?php mysqli_close($connection); ?>