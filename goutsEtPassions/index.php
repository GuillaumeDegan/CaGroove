<!-- Page d'affichage des passions et des gouts -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Document</title>
    <?php
    // connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');
// recuperation de tous les gouts et de toutes les passions
$dataGouts = $db->queryGET('SELECT id,style FROM goutsmusicaux', null);

$dataPassions = $db->queryGET('SELECT nom,id FROM passions', null);

?>

</head>
<body>
<?php include '../header/header.php';?>

<div style="display: flex; width: 100%; justify-content: space-around;">
    <div>
        <h2>Goûts Musicaux</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Style</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle pour afficher tous les gouts -->
                <?php foreach ($dataGouts as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row->id); ?></td>
                        <td><?= htmlspecialchars($row->style); ?></td>
                        <td><a href="modifierForm_gout.php?id=<?= htmlspecialchars($row->id); ?>&style=<?= htmlspecialchars($row->style); ?>">Modifier</a></td>
                        <td><a href="requetes/supprimer_gout.php?id=<?= htmlspecialchars($row->id); ?>">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br />

        <h3>Ajouter un gout musical :</h3>
        <form method="post" action="requetes/ajout_gout.php">
            <label for="style">Style de musique :</label>
            <input name="style" type="text">
            <input type="submit">
        </form>
        <br />
    </div>

    <div>
        <h2>Passions</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Passion</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle pour afficher toutes les passions -->
                <?php foreach ($dataPassions as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row->id); ?></td>
                        <td><?php echo htmlspecialchars($row->nom); ?></td>
                        <td><a href="modifierForm_passion.php?id=<?= htmlspecialchars($row->id); ?>&passion=<?= htmlspecialchars($row->nom); ?>">Modifier</a></td>
                        <td><a href="requetes/supprimer_passion.php?id=<?= htmlspecialchars($row->id); ?>">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br />

        <h3>Ajouter une passion :</h3>
        <form method="post" action="requetes/ajout_passion.php">
            <label for="passion">Nom de la passion :</label>
            <input name="passion" type="text">
            <input type="submit">
        </form>
        <br />
    </div>
</div>
    
</body>
</html>