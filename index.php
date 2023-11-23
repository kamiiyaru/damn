<style>
    .register {
        font-size: 20px;
        text-decoration: none;
        color: #000;
        position: relative;
        left: 95%;
        top: 5%;
    }

    .register:hover {
        background-color: #000;
        color: white;
    }

    .register:active {
        background-color : #fff;
        color: #000;
    }

</style>

<?php
require "./data/class.php";
$data = new Data();

$title = "Crud"; 
include './inc/head.php';
include './inc/login_button.php';

if(isset($_SESSION['login'])){
    $usn = $_SESSION['login'];
    $qualify = mysqli_query($data->conn, "select admin from user where username = '$usn'");
    $qualifying = $qualify->fetch_array();
    
    if($qualifying['admin'] == 1){
        include './inc/register_btn.php';
    }
}


 ?>
    <link rel="stylesheet" href="./asset/table.css">
    <link rel="stylesheet" href="./asset/pesan.css">

<body>

<?php
    $no = 1;

    if(isset($_SESSION['pesan'])){
        echo $_SESSION['pesan'];
        unset($_SESSION['pesan']);
    }
    ?>

    <?php
    if(isset($_SESSION['login'])){
    ?>
    <table>
        <tr>
            <th class='no' >No</th>
            <th class='nama'>Nama</th>
            <th class='nis'>NIS</th>
            <th class='kelas'>Kelas</th>
            <?php $data->show_data();?>
    </table>

    <?php
    $data->tambah_data_button();
    ?>

    <?php
    
    }else{
        echo "Login Duls ga sih?";
    }
    

    ?>

</body>
</html>