<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.login {
			float: right;
		}
		.login a {
			font-size: 20px;
		}
		.user {
			padding-right: 5px;
		}
	</style>
</head>
<body>
	<div class="login">	
		<?php 
		if (!isset($_SESSION['login_info'])) {
			echo "<a href='login.php'>login</a>";
		}else {
			echo "<a class='user'>".$_SESSION['login_info']."</a>";
			echo "<a href='logout.php'>logout</a>";
		}
		 ?>
	</div>
	<a href="lihat_data.php"><button>Lihat data</button></a>
</body>
</html>