<?php
require('includes/db.php');

$text = $_POST['text'];
$email = $_SESSION['email'];

$query = $con->query("INSERT INTO posts(email, `text`) VALUES('{$email}', '{$text}') ");
if($query) {
	header('Location: home.php');
} else {
	echo "SomethingWent Wrong";
}
?>