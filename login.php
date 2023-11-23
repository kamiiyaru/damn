<?php $title = 'login'; ?>
<?php include './inc/head.php'; 
    require './data/class.php';
    $data = new Data();
?>

<style type="text/css">
        img {
            position: absolute;
            left: 42%;
        }
        h1 {
			width: 500px;;
            position: absolute;
            top: -59%;
            right:-90%;
        }
        form {
            position: absolute;
            top: 40%;
            left: 40%;
        }
        input {
            width: 200px;
            height: 30px;
            text-align: center;
            margin-bottom: 5px;
        }

        .submit {
            width: 75px;
            position: absolute;
            left: 64px;
        }

        a {
            position: relative;
            top: 23px;
            left: 9px;
        }        
    </style>
<?php
if(isset($_SESSION['pesan'])){
    echo $_SESSION['pesan'];
    unset($_SESSION['pesan']);
}
?>

<form method="POST" action="process/login_process.php">
<h1>man enter your login info broda</h1>
	<input type="name" name="username" placeholder="Username" required><br>
	<input type="password" name="password" placeholder="Password" required><br>
	<input type="submit" name="submit" class='submit'><br>
</form>