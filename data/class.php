<?php 
class data {
	public $conn;

	function __construct(){
		$this->conn = mysqli_connect("127.0.0.1","root","","login_info");

	}

	public function login_process(){
		$result = mysqli_query($this->conn, "select * from user_info");
		$username = $_POST['username'];

		if ($result) {
		    // Fetch and display data from the specified column
		    while ($row = $result->fetch_assoc()) {
		        if($username == $row['username']){
		        	echo "aciu is king";
		        }else {
		        	echo "aciu isn't king";
		        }
		    }
		} 
	}
}
 ?>
