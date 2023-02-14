<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Document</title>
    <?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');
$data = $db->query('SELECT * FROM goutsmusicaux');

?>

</head>
<body>

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
                <?php foreach ($data as $row): ?>
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
        <form method="post" action="ajout_gout.php">
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
                <?php foreach ($data as $row): ?>
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
        <form method="post" action="ajout_passion.php">
            <label for="passion">Nom de la passion :</label>
            <input name="passion" type="text">
            <input type="submit">
        </form>
        <br />
    </div>
</div>
    
</body>
</html>