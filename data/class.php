<?php session_start() ?>

<?php 

class Data {

	public $conn;
	public $username;
	private $password;

	public function __construct()	{
		$this->conn = mysqli_connect("127.0.0.1","root","","shit");
	}

	public function login() {
		//username check
		$username = $_POST['username'];
		$login = mysqli_query($this->conn, "select username from user where username = '$username'");
		$login_array = $login->fetch_assoc();

		//password check
		$password = $_POST['password'];
		$pass = mysqli_query($this->conn, "select password from user where username = '$username'");
		$pass_array = $pass->fetch_assoc();

		if ($login->num_rows == 0) {
			echo "Login Invalid - username<br>";
			echo "<a href='../login.php'>back</a>";
		}else{
			if($username == $login_array['username']){
				if ($password == $pass_array['password']) {
					$_SESSION['login'] = "$username";
					echo "Login Success";
					echo "<a href='../index.php'>back</a>";
				}else{
					echo "Login Invalid - Password<br>";
					echo "<a href='../login.php'>back</a>";
				}
			}else{
				echo "Login Invalid - username<br>";
				echo "<a href='../login.php'>back</a>";
			}
		}
	}

	public function register() {
		//username
		$username = $_POST['nama'];
		$check_usn = mysqli_query($this->conn, "select username from user where username = '$username'");

		//pass
		$password = $_POST['password'];

		if($check_usn->num_rows == 0){
			mysqli_query($this->conn, "INSERT INTO USER (username, password, admin) values ('$username','$password', 0)");
			$_SESSION['pesan_register'] = "Username berhasil terdaftar";
			header("Location: ../index.php");
		}else{
			$_SESSION['pesan_register'] = "Username telah Terdaftar";
			header("Location: ../register.php");
		}

	}

	function admin_show_data() {
		$table = mysqli_query($this->conn, "select * from student");
		$no = 1;
		
		echo "<th>aksi</th>";
		echo "</tr>";
		echo "<tr>";
		while($row = $table->fetch_array()){
			echo "<td>".$no++."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['nis']."</td>";
			echo "<td>".$row['kelas']."</td>";
			echo "<td><a href='./process/delete.php?id=".$row['id']."'>Hapus</a></td>";
		}
		echo "</tr>";
	}

	function user_show_data() {
		$table = mysqli_query($this->conn, "select * from student");
		$no = 1;

		echo "</tr>";
		echo "<tr>";
		while($row = $table->fetch_array()){
			echo "<td>".$no++."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['nis']."</td>";
			echo "<td>".$row['kelas']."</td>";
		}
		echo "</tr>";
	}

	public function show_data() {

		if(isset($_SESSION['login'])){

			//admin check
			$username = $_SESSION['login'];
			$admin = mysqli_query($this->conn, "select admin from user where username = '$username'");
			$array_adm = $admin->fetch_array();

			if($array_adm['admin'] == 1){
				$this->admin_show_data();
			}else{
				$this->user_show_data();
			}
		}
		

	}

	function delete() {
		$id = $_GET['id'];

		$delete = mysqli_query($this->conn , "delete from student where id = $id");
		header('Location: ../index.php');
	}

	public function tambah_data() {
		$nama = $_POST['nama'];
		$nis = $_POST['nis'];
		$kelas = $_POST['kelas'];

		$add = mysqli_query($this->conn, "insert into student (nama, nis, kelas) values ('$nama', $nis, '$kelas')");
		
		header("Location: ../index.php");
	
	}

}

 ?>