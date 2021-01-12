<?php

header('Access-Control-Allow-Origin: http://localhost:8080/pdo/crud/php/command.php');

include 'autoload.php';

$command = $_REQUEST['command'];
//class that includes CRUD
$operation = new Operations();

switch ($command) {
    case "create":
      $operation->create();
      break;
    case "read":
      $operation->read();
      break;
    case "edit":
      $operation->edit();
      break;
    case "update":
      $operation->update();
      break;
    case "delete":
      $operation->delete();
      break;
    case "search":
      $operation->search();
      break;
  }