<?php
//get All function
function getAll($pdo)
{
    //global $conn_db;
    $stmt = $pdo->prepare("SELECT * FROM watergroep_klanten");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};
