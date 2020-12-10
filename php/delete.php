<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/delete.php');

include '../db/db.php';

$id = $_REQUEST["id"];
// $sql= mysqli_query($con,"DELETE  FROM all_violation WHERE violation_id = $violation_id");
$sql = "DELETE FROM students WHERE id = $id";
$result = $conn->query($sql);
$conn->close();