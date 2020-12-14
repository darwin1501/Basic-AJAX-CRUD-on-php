<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/edit.php');

include '../db/db.php';

$id = $_REQUEST["id"];
$resultArray = [];

$sql = "SELECT * FROM `students` WHERE `id` =".$id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	while ($row = $result->fetch_assoc()) {
		//push objects with key into array
		$resultArray['id'] = $row['id'];
		$resultArray['firstname'] = $row['firstname'];
	}

}else{
	echo "no results";
}
//format array into JSON
echo json_encode($resultArray, JSON_PRETTY_PRINT);
