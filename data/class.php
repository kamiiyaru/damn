<?php session_start() ?>
<?php 

class Data {

	public $username;
	public $conn;
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

}

 ?>