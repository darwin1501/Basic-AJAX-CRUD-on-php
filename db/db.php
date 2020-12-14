<?php

//procedural

// $serverName = '127.0.0.1';
// $username = 'admin';
// $password = 'admin';
// $databaseName = 'students_db';

// $conn = new mysqli($serverName, $username, $password, $databaseName);

// if($conn->connect_error){
// 	die("Connection Failed: " . $conn->error);
// }

//OOP
class Auth{
	private $serverName = '127.0.0.1';
	private $username = 'admin';
	private $password = 'admin';
	private $databaseName = 'students_db';
	private $conn;

	public function checkAuth(){
		$conn = new mysqli($this->serverName, $this->username, $this->password, $this->databaseName);
		if ($conn->connect_error) {
			die("Connection Failed". $this->$conn->error);
		}else{
			return $conn;
		}
	}
}
$auth = new Auth();
$conn = $auth->checkAuth();
