<!-- Page de formulaire d'ajout d'une nouvelle horaire (liaison entre un event et un artiste) -->

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

// génération du token
require "../nocsrf.php";
$token = NoCSRF::generate( 'token' );

// recuperation de tous les artistes et evenements
$artists = $db->queryGET('SELECT id,nom,style,reseauxSociaux,nationalite FROM artiste', null);
$events = $db->queryGET('SELECT id,nom,places,lieu,date FROM event', null);


?>

<body>
<?php include '../header/header.php';?>
    <form action="ajout_horaire_send.php" method="post">
        <label for="horaire">Horaire</label>
        <input type="datetime-local" id="horaire" name="horaire">

        <label for="idArtiste"></label>
        <!-- Select avec les options contenant tous les artistes -->
        <select name="idArtiste" id="idArtiste">
            <option>Choisir un artiste</option>
        <?php foreach ($artists as $row): ?>
            <option value='<?= htmlspecialchars($row->id) ?>'><?= htmlspecialchars($row->nom) ?></option>
        <?php endforeach; ?>
        </select>

        <label for="idEvent"></label>
        <!-- Select avec les options contenant tous les evenements -->
        <select name="idEvent" id="idEvent">
            <option>Choisir un événement</option>
        <?php foreach ($events as $row): ?>
            <option value='<?= htmlspecialchars($row->id) ?>'><?= htmlspecialchars($row->nom) ?></option>
        <?php endforeach; ?>
        </select>
        <input type="hidden" name="token" value="<?= $token ?>" />

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>