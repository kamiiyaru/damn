<?php session_start()?>
<?php $title="register"?>
<?php include "./inc/head.php"?>

<style type="text/css">
        img {
            position: absolute;
            left: 42%;
        }

        h1 {
			width: 500px;;
            position: absolute;aa
            top: -50%;
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

        select {
        	margin-bottom: 5px;
        }
    </style>
<body>
    <?php
    if(isset($_SESSION['pesan_register'])){
        echo $_SESSION['pesan_register'];
        session_unset();
    }
    ?>
	<form method="POST" action="./process/register_process.php">
		<input type="name" name="nama" placeholder='nama' required><br>
		<input type="password" name="password" placeholder='password' required><br>
		<input type="submit" name="submit">
	</form>
</body>