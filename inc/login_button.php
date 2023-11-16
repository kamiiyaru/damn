<style>
	a {
		margin-left: 10px;
		float: right;
		font-size: 25px;
	}

</style>

<?php 
	if (!isset($_SESSION['login'])) {
		echo "<a href='login.php'>login</a>";
	}else{
		echo "<a>".$_SESSION['login']."</a>";
		echo "<a href='logout.php'>logout</a>";
}

 ?>
