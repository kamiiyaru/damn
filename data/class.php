<?php 
class data {
	public $conn;

	public function __constructor(){

		$this->conn = new mysqli_connect("127.0.0.1","root","",'login_info');
		if ($conn->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
		}
		echo "connected";
	}
}
 ?>
