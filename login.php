<?php 
include "inc/important.php"
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
</head>
<body>
    <form method="POST" action="./process/login_process.php">
        <input type="name" name="username" placeholder="username" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>