<?php

require('includes/db.php');
$email = $_SESSION['email'];
$id = $_GET['id'];

$liked = $con->query("SELECT * FROM likes WHERE post='{$id}' AND email='{$email}'");

if($liked->num_rows == 0) {
	$query = $con->query("INSERT INTO likes (email, post) VALUES ('{$email}', '{$id}')");
} else {
	$query = $con->query("DELETE FROM likes WHERE post='$id' AND email='$email'");
}

header('Location: home.php');

?>