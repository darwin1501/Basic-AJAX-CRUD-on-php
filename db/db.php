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
// class Auth{
// 	// private $serverName = '127.0.0.1';
// 	private $serverName = 'localhost';
// 	private $username = 'admin';
// 	private $password = 'admin';
// 	private $databaseName = 'students_db';
// 	private $conn;

// 	public function checkAuth(){
// 		$conn = new mysqli($this->serverName, $this->username, $this->password, $this->databaseName);
// 		if ($conn->connect_error) {
// 			die("Connection Failed". $this->$conn->error);
// 		}else{
// 			return $conn;
// 		}
// 	}
// }

//OOP PDO
class Auth{
	private $serverName = 'localhost';
	private $username = 'admin';
	private $password = 'admin';
	private $databaseName = 'students_db';
	private $conn;

	public function checkAuth(){
		try {
			$conn = new PDO("mysql:host={$this->serverName};dbname={$this->databaseName}", $this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
