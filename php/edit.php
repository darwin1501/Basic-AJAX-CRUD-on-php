<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/edit.php');

include '../db/db.php';

$id = $_REQUEST["id"];

$sql = "SELECT * FROM `students` WHERE `id` =".$id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	while ($row = $result->fetch_assoc()) {
		echo $row['id'].' ';
		echo $row['firstname'];
	}

}else{
	echo "no results";
}

// SELECT * FROM `students` WHERE `id` = 70 