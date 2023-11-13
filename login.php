<?php $title = 'login'; ?>
<?php include './inc/head.php'; ?>

<form method="POST" action="process/login_process.php">
	<input type="name" name="username" placeholder="Username" required><br>
	<input type="password" name="password" placeholder="Password" required><br>
	<input type="submit" name="submit"><br>
	<a>register</a>
</form>