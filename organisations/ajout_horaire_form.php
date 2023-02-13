<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');
$artists = $db->queryGET('SELECT * FROM artiste');
$events = $db->queryGET('SELECT * FROM event');

$arrayArtists = json_decode(json_encode($artists), true);
$arrayEvents = json_decode(json_encode($events), true);

?>

<body>
    <form action="ajout_horaire_send.php" method="post">
        <label for="horaire">Horaire</label>
        <input type="datetime-local" id="horaire" name="horaire">

        <label for="idArtiste"></label>
        <select name="idArtiste" id="idArtiste">
            <option>Choisir un artiste</option>
        <?php foreach ($arrayArtists as $row): ?>
            <option value='<?= $row['id'] ?>'><?= $row['nom'] ?></option>
        <?php endforeach; ?>
        </select>

        <label for="idEvent"></label>
        <select name="idEvent" id="idEvent">
            <option>Choisir un événement</option>
        <?php foreach ($arrayEvents as $row): ?>
            <option value='<?= $row['id'] ?>'><?= $row['nom'] ?></option>
        <?php endforeach; ?>
        </select>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>