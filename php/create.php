<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/create.php');

include '../db/db.php';
//old code
// $firstname = $_REQUEST["data"];

// $sql = "INSERT INTO students (id, firstname) VALUES (NULL, '$firstname')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
//OOP
class Create{
	public function createRecords(){
		//database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();

		$firstname = trim($_REQUEST["firstname"]);
		$middlename = trim($_REQUEST["middlename"]);
		$lastname = trim($_REQUEST["lastname"]);
		$email = trim($_REQUEST["email"]);

		$sql = "INSERT INTO students (id, firstname, middlename, lastname, email) VALUES (NULL, '$firstname', '$middlename', '$lastname', '$email')";

		if ($conn->query($sql) === TRUE) {
  		echo "New record created successfully";
  		echo $email;
		} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
}

$create = new Create();
$create->createRecords();

