<?php
	require('includes/db.php');
	if(!isset($_SESSION['email'])) {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>SNetork</h1>
		<h3>Welcome <?php echo $_SESSION['email']; ?>
	<a href="logout.php">Logout</a></h3>
		<form method="post" action="post.php">
			<textarea name="text" class="form-control" placeholder="Update your status..."></textarea>
			<button type="submit" class="btn btn-primary">POST</button>
		</form>
		<br>
		<br>
		<h3>Recent Posts</h3>
		<?php
			$query = $con->query("SELECT * FROM posts ORDER BY id desc");
			if($query->num_rows == 0) {
				echo "No updates yet.";
			} else {
				echo "<ul class='list-group'>";
				while($row = $query->fetch_assoc()) {
					$id = $row["id"];
					$email = $_SESSION['email'];

					$liked = $con->query("SELECT * FROM likes WHERE post='{$id}' AND email='{$email}'");
					if($liked->num_rows == 0) {
						$liked = "Like";
					} else {
						$liked = "Unlike";
					}

					$likes = $con->query("SELECT * FROM likes WHERE post='{$id}'");
					$totalLikes = $likes->num_rows;

					echo "<li class='list-group-item'><b>". $row['email']. "</b><br> " .$row['text'];
					echo "<br>";
					echo "$totalLikes <a href='like.php?id=$id'>$liked</a></li>";
				}
				echo "</ul>";
			}
		?>
	</div>
</body>
</html>