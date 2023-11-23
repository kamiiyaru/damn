<?php session_start() ?>
<?php unset($_SESSION['login']) ?>
<?php 
$_SESSION['pesan'] = '<a class="berhasil">Logout berhasil</a><br>';
header('location: index.php')
 ?>