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

$id = $_GET['id'];

$horaire = $db->queryGET("SELECT organisation.id, horaires, artiste.nom as artiste, event.nom as event FROM organisation INNER JOIN artiste ON organisation.idArtiste = artiste.id INNER JOIN event ON organisation.idEvent = event.id WHERE organisation.id = $id");
$arrayHoraire = json_decode(json_encode($horaire[0]), true);
var_dump($arrayHoraire['horaires']);

$artists = $db->queryGET('SELECT * FROM artiste');
$events = $db->queryGET('SELECT * FROM event');

$arrayArtists = json_decode(json_encode($artists), true);
$arrayEvents = json_decode(json_encode($events), true);

?>

<body>
    <form action="modifier_horaire_send.php?id=<?= $id ?>" method="post">
        <label for="horaire">Horaire</label>
        <input type="text" name="horaire" id="horaire" value='<?= $arrayHoraire['horaires'] ?>'>

        <label for="idArtiste"></label>
        <select name="idArtiste" id="idArtiste">
        <?php foreach ($arrayArtists as $row): ?>
            <?php if($arrayHoraire['artiste'] === $row['nom']): ?>
                <option selected value='<?= $row['id'] ?>'><?= $row['nom'] ?></option>
            <?php else : ?>
                <option value='<?= $row['id'] ?>'><?= $row['nom'] ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
        </select>

        <label for="idEvent"></label>
        <select name="idEvent" id="idEvent">
        <?php foreach ($arrayEvents as $row): ?>
            <?php if($arrayHoraire['event'] === $row['nom']): ?>
                <option selected value='<?= $row['id'] ?>'><?= $row['nom'] ?></option>
            <?php else : ?>
                <option value='<?= $row['id'] ?>'><?= $row['nom'] ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
        </select>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>