<?php

require('includes/db.php');
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cPassword = $_POST['c_password'];

	if(empty($name) || empty($email) || empty($password)) {
		echo "All fields are mandatory.";
	} elseif($password != $cPassword) {
		echo "Confirm password do not match.";
	} else {
		$password = md5($password);
		$sqlQuery = $con->query("INSERT INTO users (name, email, password) VALUES('{$name}', '{$email}', '{$password}')");
		if($sqlQuery) {
			header('Location: home.php');
			die;
		} else {
			echo "Something went wrong.";
		}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h3>Signup</h3>
		<form method="post">

			<label>Full Name</label>
			<input type="text" name="name" class="form-control">

			<label>Email</label>
			<input type="email" name="email" class="form-control">

			<label>Password</label>
			<input type="password" name="password" class="form-control">

			<label>Confirm Password</label>
			<input type="password" name="c_password" class="form-control">

			<br>
			<button class="btn btn-primary" type="submit" name="submit">Signup</button>
		</form>
	</div>
</body>
</html>