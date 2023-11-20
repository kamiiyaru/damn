<style>
	.login {
		margin-left: 10px;
		float: right;
		font-size: 25px;
	}

</style>

<?php 
	if (!isset($_SESSION['login'])) {
		echo "<a href='login.php' class='login'>login</a>";
	}else{
		echo "<a class='login'>".$_SESSION['login']."</a>";
		echo "<a href='logout.php' class='login'>logout</a>";
}

 ?>
