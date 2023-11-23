<?php session_start()?>
<?php $title="register"?>
<?php include "./inc/head.php"?>

<link rel="stylesheet" href="./asset/form.css">
<body>
    <?php
    if(isset($_SESSION['pesan'])){
        echo $_SESSION['pesan'];
        session_unset();
    }
    ?>
	<form method="POST" action="./process/register_process.php">
		<input type="name" name="nama" placeholder='nama' required><br>
		<input type="password" name="password" placeholder='password' required><br>
        <select name="admin">
            <option value="0">false</option>
            <option value="1">true</option>
        </select><br>
		<input type="submit" name="submit">
	</form>
</body>