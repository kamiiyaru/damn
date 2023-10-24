<?php session_start() ?>
<?php 
include './inc/important.php';
if (!isset($_SESSION['login_info'])) {
	echo "<a href='login.php'>login</a>";
}else {
	echo $_SESSION['login_info'];
	echo "<a href='logout.php'>logout</a>";
}
 ?>