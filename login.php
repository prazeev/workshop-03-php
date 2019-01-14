<?php
require('includes/db.php');

if(isset($_POST['submit'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];
	$hashPassword = md5($password);

	$query = $con->query("SELECT * FROM users WHERE email='{$email}' AND password='{$hashPassword}'");
	if($query->num_rows == 0) {
		echo "Username and password do not match.";
	} else {
		$_SESSION['email'] = $email;
		header('location: home.php');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h3>Login</h3>
		<form method="post">
			<label>Email</label>
			<input type="email" name="email" class="form-control">

			<label>Password</label>
			<input type="password" name="password" class="form-control">
			<br>
			<button class="btn btn-primary" type="submit" name="submit">Login</button>
		</form>
	</div>
</body>
</html>