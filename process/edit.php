<?php include "../inc/important.php";?>
<link rel="stylesheet" href="../asset/form.css">
<?php
$id = $_GET['id'];
$result = mysqli_query($data->conn, "select * from student where id = $id");
$row = $result->fetch_array();

$nama = $row['nama'];
$nis = $row['nis'];
$kelas = $row['kelas'];

?>

<style>
    h1 {
        left : 68px;
    }
</style>

<form method="post"  action="edit_process.php?id=<?php echo $id ?>">
    <h1>Edit</h1>
    <input type="name" name="nama" value="<?php echo $row['nama']; ?>" required><br>
    <input type="number" name="nis" min='1' value="<?php echo $row['nis']; ?>" required><br>
    <select name="kelas">
        <option value='X'>X</option>
        <option value='XI'>XI</option>
        <option value='XII'>XII</option>
    </select><br>
    <input type="submit" name="submit">
</form>