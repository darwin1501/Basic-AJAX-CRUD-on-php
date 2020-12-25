<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/update.php');

include '../db/db.php';
//old code
// $id = $_REQUEST["id"];
// $firstname = $_REQUEST["fname"];

// $sql = "UPDATE students SET firstname = '$firstname' WHERE `id` = '$id'";
// $result = $conn->query($sql);

// $conn->close();
// $firstname = trim($_REQUEST["data"], '\n \t ""');
//OOP
class Update{
	public function updateRecord(){
		//database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();
		
		$id = $_REQUEST["id"];
		$firstname = trim($_REQUEST["firstname"]);
		$middlename = trim($_REQUEST["middlename"]);
		$lastname = trim($_REQUEST["lastname"]);
		$email = trim($_REQUEST["email"]);

		$sql = "UPDATE students SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', email = '$email' WHERE `id` = '$id'";
		$result = $conn->query($sql);

		$conn->close();
	}
}

$update = new Update();
$update->updateRecord();
