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
	<style>
		.loginbox{
	width: 320px;
	height: 420px;
	background: rgba(0,0,0,0.8);
	color: #fff;
	top: 50%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 70px 30px;
}
h1{
	margin:0;
	padding: 0 0 20px;
	text-align: center; 
	font-size: 22px;
}
.loginbox p{
	margin: 0;
	padding: 0;
	font-weight: bold;
}
.loginbox input{
	width: 100%;
	margin-bottom: 20px;
}

.loginbox input[type="text"],input[type="password"]{
	border:none;
	border-bottom:1px solid #fff;
	background:  transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;

}
.loginbox input[type="submit"]
{
	border:none;
	outline: none;
	background: #3896ee;
	color: #fff;
	font-size: 18px;
	border-radius: 20px;

}
.loginbox input[type="submit"]:hover
{
	cursor: pointer;
	background-color:  #a6cef5
;
	color: #000;

}
.loginbox a{
	text-decoration: none;
	font-size: 12px;
	line-height: 20px;
	color: darkgrey;
}
.loginbox a:hover{
	color: #2920da
;
}

	</style>
</head>
<body>
	<div class="loginbox">
		
<i class="material-icons" style="color:blue;width: 100px;height: 100px;border-radius: 50%;position: absolute;top: -50px;
	left: calc(50% - 50px);
"></i>
		<h1>Login Here</h1>
	
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
		<a href="#">Lost Your Password?</a><br>
		<a href="#">Don't have an account?</a>
		
		</form></div>
</body>
</html>
<?php mysqli_close($connection); ?>
