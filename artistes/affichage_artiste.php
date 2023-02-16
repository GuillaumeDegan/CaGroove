<!-- Page d'affichage des artistes -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    // appel bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');
// Récupération de tous les artistes
$data = $db->queryGET('SELECT id,nom,style,reseauxSociaux,nationalite FROM artiste');
?>
</head>
<body>
<?php include '../header/header.php';?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Style</th>
            <th>Reseaux Sociaux</th>
            <th>Nationalité</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row->id) ?></td>
                <td><?= htmlspecialchars($row->nom) ?></td>
                <td><?= htmlspecialchars($row->style) ?></td>
                <td><?= htmlspecialchars($row->reseauxSociaux) ?></td>
                <td><?= htmlspecialchars($row->nationalite) ?></td>
                <td><a href="modifier_artiste1.php?id=<?= htmlspecialchars($row->id) ?> ">modifier</a></td>
                <td><a href="supprimer_artiste1.php?id=<?= htmlspecialchars($row->id) ?> ">supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajout_artiste.php">ajouter un artiste</a>


    
</body>
</html>