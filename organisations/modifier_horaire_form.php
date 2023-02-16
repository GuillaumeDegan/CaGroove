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

$artists = $db->queryGET('SELECT id,nom,style,reseauxSociaux,nationalite FROM artiste');
$events = $db->queryGET('SELECT id,nom,places,lieu,date FROM event');


?>

<body>
<?php include '../header/header.php';?>
    <form action="modifier_horaire_send.php?id=<?= $id ?>" method="post">
        <label for="horaire">Horaire</label>
        <input type="datetime-local" id="horaire" value='<?= htmlspecialchars($horaire[0]->horaires)  ?>' name="horaire">

        <label for="idArtiste"></label>
        <select name="idArtiste" id="idArtiste">
        <?php foreach ($artists as $row): ?>
            <?php if(htmlspecialchars($artists->artiste) === htmlspecialchars($row->nom)): ?>
                <option selected value='<?= htmlspecialchars($row->id) ?>'><?= htmlspecialchars($row->nom) ?></option>
            <?php else : ?>
                <option value='<?= htmlspecialchars($row->id) ?>'><?= htmlspecialchars($row->nom) ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
        </select>

        <label for="idEvent"></label>
        <select name="idEvent" id="idEvent">
        <?php foreach ($events as $row): ?>
            <?php if(htmlspecialchars($horaire[0]->event) === htmlspecialchars($row->nom)): ?>
                <option selected value='<?= htmlspecialchars($row->id) ?>'><?= htmlspecialchars($row->nom) ?></option>
            <?php else : ?>
                <option value='<?= htmlspecialchars($row->id)?>'><?= htmlspecialchars($row->nom) ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
        </select>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>