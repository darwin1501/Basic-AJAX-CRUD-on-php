<?php
header('Access-Control-Allow-Origin: http://localhost:8080/ajax/crud/php/delete.php');

include '../db/db.php';
//old code
// $id = $_REQUEST["id"];

// $sql = "DELETE FROM students WHERE id = $id";
// $result = $conn->query($sql);
// $conn->close();

class Delete{
	public function deleteRecord(){
		//database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();

		$id = $_REQUEST["id"];

		$sql = "DELETE FROM students WHERE id = $id";
		$result = $conn->query($sql);
		$conn->close();
	}
}

$delete = new Delete();
$delete->deleteRecord();