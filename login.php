<?php 
session_start()
 ?>

<?php 
$_SESSION['login_info'] = 'someone';
header('location: index.php')
 ?>