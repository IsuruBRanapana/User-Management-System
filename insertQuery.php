<?php  
	require_once('inc/connection.php');
?>
<?php 
if (isset($_POST['login'])) {

	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$passwrd=$_POST['password'];
	$password=sha1('$passwrd');
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
</head>
<body>
	<form action="insertQuery.php" method="post">
		First Name : <input type="text" name="first_name"><br>
		Last Name : <input type="text" name="last_name"><br>
		E-mail : <input type="text" name="email"><br>
		Password : <input type="password" name="password"><br>
		<input type="submit" name="login" value="Log In">
	</form>
</body>
</html>
<?php mysqli_close($connection); ?>