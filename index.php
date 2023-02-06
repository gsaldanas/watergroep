<?php
//required files
//show errors
require('inc/headerErrors.php');
//get the connection
require('inc/db.conn.php');
// get all the data
require('crud/read/read.php');
//variables
$pdo = $conn_db;
//put all data in a variable
//$data = getAll($pdo);

//check data in a var dump
// echo '<pre>';
// var_dump($data);
$warning = "";
$isId = FALSE;
//check  ID
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    if (existClient($id, $pdo)) {
        $isId = TRUE;
        $client = getClient($id, $pdo);
        $clientNaam = $client['Voornaam'] . " " . $client['Naam'];
    } else {
        $warning = "verkeerde klant id";
    }
}

// echo '<pre>';
// var_dump($client);
//SELECT METER STAND FROM CLIENT
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <?php if (!$isId) { ?>
            <?= $warning ?>
            <form action="index.php">

                <label for="id">Klant ID</label><br>
                <input type="text" name="id" required value="" placeholder="Gelieve een id in tegeven" /><br>
                <button class="btn_add" type="submit">send</button>
            </form>
        <?php } else { ?>


            <!-- hide ID klant -->
            <h1>Dit zijn de klantgevens van <?= $clientNaam ?> </h1>
            <form id="form" enctype="multipart/form-data" method="POST" action="crud/create/insertStand.php">
                <label hidden for="id">id</label><br>
                <input type="hidden" name="id" required value="<?= $client['id'] ?>" /><br>
                <label for="voornaam">Voornaam</label><br>
                <input type="text" name="voornaam" disabled required value="<?= $client['Voornaam'] ?>" /><br>

                <label for="naam">Naam</label><br>
                <input type="text" name="naam" disabled required value="<?= $client['Naam'] ?>" /><br>

                <label for="straatnaam">Straatnaam</label><br>
                <input type="text" name="straatnaam" disabled required value="<?= $client['Straatnaam'] ?>" /><br>

                <label for="nrbus">Nummerbus</label><br>
                <input type="text" name="nrbus" disabled required value="<?= $client['Nummerbus'] ?>" /><br>

                <label for="pcode">Postcode</label><br>
                <input type="text" name="pcode" disabled required value="<?= $client['Postcode'] ?>" /><br>

                <label for="loc">Locatie</label><br>
                <input type="text" name="loc" required disabled value="<?= $client['Locatie'] ?>" /><br>

                <label for="meter">Huidige meterstand</label><br>
                <input type="text" name="meterstand" required value="" placeholder="meterstand" /><br>

                <button class="btn_add" type="submit">send</button>
                <button id="cancel_btn">Cancel</button>
            </form>
        <?php } ?>
    </main>
</body>

</html>