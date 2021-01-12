<?php

function database(){
    require_once '../db/db.php';
}
function operations(){
    require_once 'operations.php';
}

spl_autoload_register('database');
spl_autoload_register('operations');