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
		while($row = $table->fetch_array){
			echo $no++;
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['nis']."</td>";
			echo "<td>".$row['kelas']."</td>";
			echo "<td>Hapus</td>";
		}
		echo "</tr>";
	}

	function user_show_data() {
		$table = mysqli_query($this->conn, "select * from student");
		$no = 1;

		echo "</tr>";
		echo "<tr>";
		while($row = $table->fetch_array){
			echo $no++;
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['nis']."</td>";
			echo "<td>".$row['kelas']."</td>";
		}
		echo "</tr>";
	}

	function show_data() {

		if(isset($_SESSION['login'])){

			//admin check
			$username = $_SESSION['login'];
			$admin = mysqli_query($this->conn, "select admin from user where username = '$username'");
			$array_adm = $admin->fetch_array();

			if($array_adm == 1){
				echo 'is admin';
			}else{
				echo 'not admin';
			}
		}else{
			echo 'login first';
		}
		

	}

}

 ?>