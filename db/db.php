<?php
$serverName = '127.0.0.1';

$username = 'admin';

$password = 'admin';

$databaseName = 'students_db';

$conn = new mysqli($serverName, $username, $password, $databaseName);

if($conn->connect_error){
	die("Connection Failed: " . $conn->error);
}

// echo "Connected Succesfully";


// INSERT INTO `students` (`id`, `firstname`) VALUES (NULL, 'foo');

// $sql = "INSERT INTO students (id, firstname) VALUES (NULL, 'foobar')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();`