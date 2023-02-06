<?php
//show errors
require($_SERVER['DOCUMENT_ROOT'] . '/watergroep/inc/headerErrors.php');
//db conneciton
require($_SERVER['DOCUMENT_ROOT'] . '/watergroep/inc/db.conn.php');
//get data
require($_SERVER['DOCUMENT_ROOT'] . '/watergroep/crud/read/read.php');
$pdo = $conn_db;

if (!isset($_REQUEST['completed'])) {
    header('Location: https://s13.syntradeveloper.be/watergroep/');
} else {
    $completed = $_REQUEST['completed'];
    if ($completed == 1) {
        $message = "je meterstand werd ingevuld";
        $klantId = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $data =  getLastMeassures($klantId, $pdo);
        // echo '<pre>';
        // var_dump($data);
        $stand1 = $data[0]['Meterstand'];
        $datum1 = $data[0]['Created_at'];
        $stand2 = $data[1]['Meterstand'];
        $datum2 = $data[1]['Created_at'];
        $difference = $stand1 - $stand2;
        $info = " Het verbruik  ";
        if ($difference < 0) {
            $info .= " is lager dan de vorige stand.";
        } else {
            $info .= " is hoger dan de vorige stand.";
        }
    } else {
        $message = "er was een fout opgetreden, gelieve opnieuw te proberen";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed</title>
</head>

<body>

    <h1><?php echo $message ?></h1>
    <table border="1">
        <thead>
            <th>Meterstand</th>
            <th>Datum</th>
        </thead>
        <tr>
            <td><?= $stand1 ?></td>
            <td><?= $datum1 ?></td>
        </tr>
        <tr>
            <td><?= $stand2 ?></td>
            <td><?= $datum2 ?></td>
        </tr>
    </table>
    <p>Het verchil is <?= $difference . "<br>" . $info ?></p>
    <a href="https://s13.syntradeveloper.be/watergroep/">Nog een meterstand ingeven</a>
</body>

</html>