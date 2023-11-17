<?php
$title = "tambah data";
include "./inc/head.php";
?>

<style>
    h1{
        left:5%;
    }
</style>

<link rel="stylesheet" href="./asset/form.css">

<form method="POST" action="./process/add.php">
    <h1>Tambah Data</h1>
    <input type="name" name="nama" placeholder='nama' require><br>
    <input type="number" min='1000000000' name="nis" placeholder="nis" require><br>
    <select name="kelas">
        <option value="">pilih kelas</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
    </select><br>
    <input type="submit" name="submit"> 
</form>