<?php
function updateStand($data, $pdo)
{
    // $data = [
    //     'id' => $id,
    //     'Waterstand' => $waterStand
    // ];
    $sql = "UPDATE watergroep_inzendingen SET Meterstand = :Waterstand WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
