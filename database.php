<?php

$db_name = 'todo_list';
$db_password = '123456';
$db_user = 'kenny';
$db_host = 'localhost';

// connect to database 
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);

// check connection

if($connection->connect_error) {
    die('connection Faild');
}