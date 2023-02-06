<?php
//PDO connection
$db_host = 'ID396978_funcprog.db.webhosting.be';
$db_user = 'ID396978_funcprog';
$db_password = '57tF16BY81835Y7OM32O';
$db_db = 'ID396978_funcprog';
$dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_db;

try {
    $conn_db = new PDO($dsn, $db_user, $db_password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br />";
    die();
}
