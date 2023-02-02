<?php
//required files
//show errors
require('config/headerErrors.php');
//get the connection
require('config/conn.php');
// get all the data
require('crud/read/read.php');
//variables
$pdo = $conn_db;
$data = getAll($pdo);

echo '<pre>';
var_dump($data);
