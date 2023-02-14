<!-- Page d'affichage des evenements -->

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

// requete de récuperation de tous les events
$data = $db->queryGET('SELECT * FROM event');
?>


</head>
<body>
<?php include '../header/header.php';?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Place</th>
            <th>Nom</th>
            <th>Lieu</th>
            <th>Date</th>
            <th>modif</th>
            <th>supression</th>
        </tr>
    </thead>
    <tbody>
        <!-- Boucle pour afficher tous les events -->
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row->id);?></td>
                <td><?= htmlspecialchars($row->places); ?></td>
                <td><?= htmlspecialchars($row->nom); ?></td>
                <td><?= htmlspecialchars($row->lieu); ?></td>
                <td><?= htmlspecialchars($row->date); ?></td>
                <td><a href="modifier_event1.php?id=<?= htmlspecialchars($row->id); ?> ">modifier</a></td>
                <td><a href="supprimer_event1.php?id=<?= htmlspecialchars($row->id); ?> ">suppression</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajoutForm_event.php">ajouter un event</a>
    
</body>
</html>