<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/update.php');

include '../db/db.php';

$id = $_REQUEST["id"];
$firstname = $_REQUEST["fname"];

$sql = "UPDATE students SET firstname = '$firstname' WHERE `id` = '$id'";
$result = $conn->query($sql);

$conn->close();
