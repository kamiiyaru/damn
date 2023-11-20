<?php
require "./data/class.php";
$data = new Data();

$title = "Crud"; 
include './inc/head.php';
include './inc/login_button.php'
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

    <a href="tambah_data.php" class="addButon"><button>tambah data</button></a>
    <?php
    
    }else{
        echo "Login Duls ga sih?";
    }
    

    ?>

</body>
</html>