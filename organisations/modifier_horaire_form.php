<!-- Page de formulaire de modification d'une horaire -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 
//connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recuperation de l'id de l'horaire a modifier
$idHoraire = $_GET['idHoraire'];
$Artist = $_GET['artist'];
$Event = $_GET['event'];

// récupération des données de l'horaire en fonction de son id
$horaire = $db->queryGET("SELECT organisation.id, horaires, artiste.nom as artiste, event.nom as event FROM organisation INNER JOIN artiste ON organisation.idArtiste = artiste.id INNER JOIN event ON organisation.idEvent = event.id WHERE organisation.id = $idHoraire");

// recuperation de tous les artistes et evenements
$artists = $db->queryGET('SELECT * FROM artiste');
$events = $db->queryGET('SELECT * FROM event');

?>

<body>
    <form action="modifier_horaire_send.php?id=<?= $idHoraire ?>" method="post">
        <label for="horaire">Horaire</label>
        <input type="datetime-local" id="horaire" value='<?= htmlspecialchars($horaire[0]->horaires)  ?>' name="horaire">

        <label for="idArtiste"></label>
        <select name="idArtiste" id="idArtiste">
            <!-- Boucle pour afficher tous les artistes et selectionner par defaut celui qui était deja choisi -->
        <?php foreach ($artists as $row): ?>
            <?php if($Artist === htmlspecialchars($row->nom)): ?>
                <option selected value='<?= htmlspecialchars($row->id) ?>'><?= htmlspecialchars($row->nom) ?></option>
            <?php else : ?>
                <option value='<?= htmlspecialchars($row->id) ?>'><?= htmlspecialchars($row->nom) ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
        </select>

        <label for="idEvent"></label>
        <select name="idEvent" id="idEvent">
            <!-- Boucle pour afficher tous les evenements et selectionner par defaut celui qui était deja choisi -->
        <?php foreach ($events as $row): ?>
            <?php if($Event === htmlspecialchars($row->nom)): ?>
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