<?php
//PDO connection
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'watergroep';
$dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_db;

try {
    $conn_db = new PDO($dsn, $db_user, $db_password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br />";
    die();
}
