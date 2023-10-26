<?php 
session_start()
 ?>

<?php 
class data {
	public $conn;

	function __construct(){
		$this->conn = mysqli_connect("127.0.0.1","root","","login_info");

	}

	public function login_process(){
		$result = mysqli_query($this->conn, "select * from user_info");
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$get_pass = mysqli_query($this->conn, "select password from user_info where username = '$username'");
		$array_pass = $get_pass->fetch_assoc();

		if ($result) {
		    // Fetch and display data from the specified column
		    while ($row = $result->fetch_assoc()) {
		        if($username == $row['username']){
		        	if ($pass == $array_pass['password']) {
		        		$_SESSION['login_info'] = $username;
		        		echo "Login Sucessful<br>";
		        		echo "<a href='../index.php'>continue</a>";
		        	}else{
		        		echo "pass invalid";
		        		echo "<br><a href='../login.php'>return</a>";
		        	}
		        }else {
		        	echo "Username Invalid";
		        	echo "<br><a href='../login.php'>return</a>";
		        }
		    }
		} 
	}
}
 ?>
