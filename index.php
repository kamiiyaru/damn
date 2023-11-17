<?php
require "./data/class.php";
$data = new Data();

$title = "Crud"; 
include './inc/head.php';
include './inc/login_button.php'
 ?>
    <link rel="stylesheet" href="./asset/index.css">

<body>

<?php
    $no = 1;

    if(isset($_SESSION['pesan_register'])){
        echo $_SESSION['pesan_register'];
        session_unset();
    }
?>

    <?php
    if(isset($_SESSION['login'])){
    ?>
    <table>
        <tr>
            <th class='no' >no</th>
            <th class='nama'>nama</th>
            <th class='nis'>nis</th>
            <th class='kelas'>kelas</th>
            <?php $data->show_data();?>
    </table>
    <?php
    
    }else{
        echo "Login Duls ga sih?";
    }
    
    ?>

</body>
</html>