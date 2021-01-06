<?php

header('Access-Control-Allow-Origin: http://localhost:8080/pdo/crud/php/command.php');

include 'operations.php';

$command = $_REQUEST['command'];
//class that includes CRUD
$operation = new Operations();

if ($command == 'create'){
    $operation->create();
}else if($command == 'read'){
    $operation->read();
}else if($command == 'edit'){
    $operation->edit();
}else if($command == 'update'){
    $operation->update();
}else if($command == 'delete'){
    $operation->delete();
}else if($command == 'search'){
    $operation->search();
}