<?php

function insertWaterStand($data, $pdo)
{
    // echo '<pre>';
    // print_r($data);
    // $data =[
    //     'id' = $id,
    //     'Meterstand' = $meterstand,
    //'dateCreated' => $dateCreated,
    //'dateUpdated' => $dateUpdated,

    // ]
    // $datum = date('Y-m-d H:i:s'); watergroep_inzendingen
    // INSERT INTO `watergroep_inzendingen`( `watergroep_klanten_id`, `Meterstand`, `Created_at`, `Updated_at`) VALUES (1,200,'2023-02-04 15:28:06','2023-02-04 15:28:06')
    $sql = "INSERT INTO watergroep_inzendingen (watergroep_klanten_id, Meterstand, Created_at, Updated_at) VALUES (:klantid, :meterstand,:dateCreated, :dateUpdated)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':klantid', $data['id']);
    $stmt->bindParam(':meterstand', $data['Meterstand']);
    $stmt->bindParam(':dateCreated', $data['dateCreated']);
    $stmt->bindParam(':dateUpdated', $data['dateUpdated']);

    return $stmt->execute();
}
