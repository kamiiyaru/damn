<?php $title = "register"; ?>
<?php include '../inc/important.php'; ?>

<?php 
if(isset($_POST['submit'])) {
	$data->register();
}
?>