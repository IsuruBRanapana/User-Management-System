<?php  
	require_once('inc/connection.php');
?>
<?php 
if (isset($_POST['login'])) {

	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$passwrd=$_POST['password'];
	$password=md5($passwrd);
	$query="INSERT INTO user(first_name,last_name,email,password) VALUES ('$first_name','$last_name','$email','$password')";
	$result=mysqli_query($connection,$query);
	if ($result) {
		echo "Data Added";
	}else{
		echo "Fail";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Insert query</title>
	<style type="text/css">
.sign{
	width: 350px;
	border-radius: 20px;
	margin: auto;
	background:rgba(0,0,0,0.8);
	box-sizing: border-box;
	padding: 40px;
	color: #fff;
	margin-top: 100px;
}
form:hover{
	opacity: 1.0;
}
h2{
	text-align: center;
	color: ;
}
input[type=text],input[type=password]{
	width: 100%;
	box-sizing: border-box;
	padding: 12px 5px;
	background:rgba(0,0,0,0.10);
	outline: none;
	border:none;
	border-bottom: 1px dotted #fff;
	color: #fff;
	border-radius: 5px;
	margin:5px;
	font-weight: bold;
}
input[type=submit]{
	width: 100%;
	box-sizing: border-box;
	padding: 2px 0;
	margin-top: 20px;
	outline: none;
	border:none;
	border-radius: 20px;
	background:#d500f9;
	opacity: 0.7;
	font-size: 20px;
	color: #fff;
}
input[type=submit]:hover{
	background:;
	opacity:0.2;
}
p{
	font-size: 12px;
		}
p a{
	font-size: 12px;
	text-decoration: none;
}
	</style>
</head>
<body>
	<div class="sign">
	<h2>SignUp Here</h2>
	<form action="insertQuery.php" method="post">
		<input type="text" name="first_name" placeholder="First Name"><br><br>
		<input type="text" name="last_name" placeholder="Last Name"><br><br>
		<input type="text" name="email" placeholder="E-mail" ><br><br>
		<input type="password" name="password" placeholder="Password"><br><br>
		<input type="submit" name="login" value="Log In">
		<br><br>
		<p>Already you have an account?<a href="log.php">login</a></p>

	</form>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>
