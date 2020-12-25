<?php

header('Access-Control-Allow-Origin: http://localhost:8080/ajax/crud/php/edit.php');

include '../db/db.php';
//old code
// $id = $_REQUEST["id"];
// $resultArray = [];

// $sql = "SELECT * FROM `students` WHERE `id` =".$id;
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
	
// 	while ($row = $result->fetch_assoc()) {
// 		//push objects with key into array
// 		$resultArray['id'] = $row['id'];
// 		$resultArray['firstname'] = $row['firstname'];
// 	}

// }else{
// 	echo "no results";
// }
// //format array into JSON
// echo json_encode($resultArray, JSON_PRETTY_PRINT);

// $conn->close();
//OOP
class Edit{
	public function editRecords(){
		//database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();

		$id = $_REQUEST["id"];
		$resultArray = [];

		$sql = "SELECT * FROM `students` WHERE `id` =".$id;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
			//push objects with key into array
			$resultArray['id'] = $row['id'];
			$resultArray['firstname'] = $row['firstname'];
			$resultArray['middlename'] = $row['middlename'];
			$resultArray['lastname'] = $row['lastname'];
			$resultArray['email'] = $row['email'];
			}
		}else{
			// echo "no results";
		}
		//format array into JSON
		echo json_encode($resultArray, JSON_PRETTY_PRINT);
		$conn->close();
	}
}

$edit = new Edit();
$edit->editRecords();