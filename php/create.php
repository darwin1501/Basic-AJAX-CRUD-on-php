<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/create.php');

include '../db/db.php';

$firstname = $_REQUEST["data"];


$sql = "INSERT INTO students (id, firstname) VALUES (NULL, '$firstname')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();