<!-- Page d'affichage de toutes les horaires -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    // connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recuperation de toutes les horaires
$data = $db->queryGET('SELECT organisation.id, horaires, artiste.nom as artiste, event.nom as event FROM organisation INNER JOIN artiste ON organisation.idArtiste = artiste.id INNER JOIN event ON organisation.idEvent = event.id');

?>
   
</head>
<body>
<?php include '../header/header.php';?>

    <h2>Horaires</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Horaires</th>
                <th>Artiste</th>
                <th>Evenement</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row->id); ?></td>
                    <td><?= htmlspecialchars($row->horaires); ?></td>
                    <td><?= htmlspecialchars($row->artiste); ?></td>
                    <td><?= htmlspecialchars($row->event); ?></td>
                    <td><a href="modifier_horaire_form.php?idHoraire=<?= htmlspecialchars($row->id); ?>&artist=<?= htmlspecialchars($row->artiste); ?>&event=<?= htmlspecialchars($row->event); ?>">Modifier</a></td>
                    <td><a href="supprimer_horaire.php?id=<?= htmlspecialchars($row->id) ?>">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br />
    <a href="ajout_horaire_form.php">Ajouter une horaire</a>

</div>
    
</body>
</html>