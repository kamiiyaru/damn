<?php session_start() ?>
<?php include '../inc/important.php'; ?>
<?php 
$username = $_POST['username'];

$_SESSION['login_info'] = $username;

$data->login_process();

 ?>