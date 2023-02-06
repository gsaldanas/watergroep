<?php
//get All function
function getAll($pdo)
{
    //global $conn_db;
    $stmt = $pdo->prepare("SELECT * FROM watergroep_klanten");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};

//Get ID AND DATA FROM CLIENT
function getClient($id, $pdo)
{
    $sql = "SELECT * FROM watergroep_klanten WHERE id =:id";
    $stmnt = $pdo->prepare($sql);
    $stmnt->bindParam(":id", $id);
    $stmnt->execute();

    return $stmnt->fetch(PDO::FETCH_ASSOC);
}


//check of klant id besta
function existClient($id, $pdo)
{
    if ($id == 0) {
        return FALSE;
    }
    $sql = "SELECT * FROM watergroep_klanten WHERE id =:id";
    $stmnt = $pdo->prepare($sql);
    $stmnt->bindParam(":id", $id);
    $stmnt->execute();
    $count = $stmnt->rowCount();

    return ($count > 0);
}
function getLastMeassures($klantId, $pdo)
{
    //SELECT Meterstand,`Created_at` FROM watergroep_inzendingen WHERE `watergroep_klanten_id`= 1 ORDER BY `Created_at` DESC LIMIT 2
    $sql = "SELECT Meterstand, Created_at FROM watergroep_inzendingen WHERE watergroep_klanten_id  =:id ORDER BY Created_at DESC LIMIT 2 ";
    $stmnt = $pdo->prepare($sql);
    $stmnt->bindParam(":id", $klantId);
    $stmnt->execute();

    return $stmnt->fetchAll(PDO::FETCH_ASSOC);
}
