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


    <?php $data->show_data();?>


</body>
</html>