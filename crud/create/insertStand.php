<?php
//echo $_SERVER['DOCUMENT_ROOT'];
require($_SERVER['DOCUMENT_ROOT'] . '/watergroep/inc/headerErrors.php');
// // //get the connection
require($_SERVER['DOCUMENT_ROOT'] . '/watergroep/inc/db.conn.php');
// // // get all the data
require('insertUtils.php');

// // //variables
$pdo = $conn_db;
$id = $_POST['id'];
$meterstand = filter_var($_POST['meterstand'], FILTER_SANITIZE_NUMBER_INT);
$time = date('Y-m-d H:i:s');

$data = array();
$data['id'] = $id; //klantId
$data['Meterstand'] = $meterstand;
$data['dateCreated'] = $time;
$data['dateUpdated'] = $time;
$bool  =  insertWaterStand($data, $pdo);
if ($bool) {
    header('Location: https://s13.syntradeveloper.be/watergroep/completed.php?completed=1&id=' . $id);
} else {
    header('Location: https://s13.syntradeveloper.be/watergroep/completed.php?completed=0');
}
//var_dump($_POST);
