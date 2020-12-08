<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/update.php');

include '../db/db.php';

$id = $_REQUEST["id"];
$firstname = $_REQUEST["fname"];

// $id = 74;

// $firstname = 'dhane';


$sql = "UPDATE students SET firstname = '$firstname' WHERE `id` = '$id'";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
// 	echo 'updated';
// }else{
// 	echo 'no result';
// }

$conn->close();
// $update = mysqli_query($con, "UPDATE accounts set fullname = '$fullname', gender = '$gender', dob = '$dob', address = '$address', cp_no = '$cp_no', user_type = '$user_role' WHERE `id` = '".$_SESSION['id']."' ");

// echo $id;
// echo $firstname;