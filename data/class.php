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

					$_SESSION['pesan'] = '<a class="berhasil">Login Berhasil</a>';
					$_SESSION['login'] = "$username";
					echo "Login Success";
					header('Location: ../index.php');
				}else{
					$_SESSION['pesan'] = '<a class="gagal">Gagal Username / Password salah</a>';
					header('Location: ../login.php');
				}
			}else{
				$_SESSION['pesan'] = '<a class="gagal">Gagal Username / Password salah</a>';
				header('Location: ../login.php');
			}
		}
	
	}

	public function register() {
		//username
		$username = $_POST['nama'];
		$check_usn = mysqli_query($this->conn, "select username from user where username = '$username'");

		//pass
		$password = $_POST['password'];

		//admin
		$admin = $_POST['admin'];

		if($check_usn->num_rows == 0){
			if(!isset($admin)){
				$admin = 0;
				
				mysqli_query($this->conn, "INSERT INTO USER (username, password, admin) values ('$username','$password', $admin)");
				$_SESSION['pesan'] = "Username berhasil terdaftar";
				header("Location: ../index.php");
			}else{
				mysqli_query($this->conn, "INSERT INTO USER (username, password, admin) values ('$username','$password', $admin)");
				$_SESSION['pesan'] = "Username berhasil terdaftar";
				header("Location: ../index.php");
			}
		}else{
			$_SESSION['pesan'] = "Username telah Terdaftar";
			header("Location: ../register.php");
		}

	}

	function admin_show_data() {
		$table = mysqli_query($this->conn, "select * from student");
		$no = 1;
		
		echo "<th colspan='2'>aksi</th>";
		echo "</tr>";

		while($row = $table->fetch_array()){
			echo "<tr>";
			echo "<td>".$no++."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['nis']."</td>";
			echo "<td>".$row['kelas']."</td>";
			echo "<td class='hapus'><a href='./process/delete.php?id=".$row['id']."'>Hapus</a></td>";
			echo "<td class='edit'><a href='./process/edit.php?id=".$row['id']."'>Edit</a></td>";
			echo "<tr>";
		}
	}

	function user_show_data() {
		$table = mysqli_query($this->conn, "select * from student where kelas is not null");
		$no = 1;

		echo "</tr>";
		while($row = $table->fetch_array()){
			echo "<tr>";
			echo "<td>".$no++."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['nis']."</td>";
			echo "<td>".$row['kelas']."</td>";
			echo "</tr>";
		}
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

		//check if data is exist by name and nis
		$name_check = mysqli_query($this->conn, "select nama from student where nama = '$nama' ");

		$nis_check = mysqli_query($this->conn, "select nis from student where nis = $nis");

		if($name_check->num_rows == 0){
			if($nis_check->num_rows == 0){
				$add = mysqli_query($this->conn, "insert into student (nama, nis, kelas) values ('$nama', $nis, '$kelas')");
				
				$_SESSION['pesan'] = '<a class="berhasil">Data berhasil ditambahkan</a>';
				header("Location: ../index.php");
			}else{
				$_SESSION['pesan'] = '<a class="gagal">GAGAL - Data NIS murid sudah terdaftar</a>';
				header("location: ../index.php");
			}
		}else{
			$_SESSION['pesan'] = '<a class="gagal">GAGAL - Nama murid sudah terdaftar</a>';
			header('location: ../index.php');
		}

	
	}

	public function tambah_data_button() {
		$username = $_SESSION['login'];
		$admin = mysqli_query($this->conn, "select admin from user where username = '$username'");
		$adm = $admin->fetch_assoc();

		if($adm['admin'] == 1){
			echo '<a href="tambah_data.php" class="addButon"><button>tambah data</button></a>';
		}
	}

	public function edit() {
		$id = $_GET['id'];
		$nama = $_POST['nama'];
		$nis = $_POST['nis'];
		$kelas = $_POST['kelas'];
	
		$qualify = mysqli_query($this->conn, "select * from student where id = $id");
		$qualifying = $qualify->fetch_assoc();

		if($nama == $qualifying['nama']){

			if($id == $qualifying['id']){
			
				if($nis == $qualifying['nis']){

					if($id == $qualifying['id']){
						mysqli_query($this->conn, "update student set nama = '$nama', nis = $nis, kelas = '$kelas' where id = $id");
						
						header('Location: ../index.php');
					}else{
						$_SESSION['pesan'] = '<a class="gagal">GAGAL - Nama sudah terdaftar</a>';
						header('Location: ../index.php');
					}
				}else{
					mysqli_query($this->conn, "update student set nama = '$nama', nis = $nis, kelas = '$kelas' where id = $id");
						
						header('Location: ../index.php');
				}

			}else{

				$_SESSION['pesan'] = '<a class="gagal">GAGAL - Nama sudah terdaftar</a>';
				header('Location: ../index.php');
			}
		}else{

			if($nis != $qualifying['nis']){
				mysqli_query($this->conn, "update student set nama = '$nama', nis = $nis, kelas = '$kelas' where id = $id");
						
				header('Location: ../index.php');
			}
		}
	}
}

 ?>