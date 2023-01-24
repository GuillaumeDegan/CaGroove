<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', '','cagroove');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all data from the table
$sqlGouts = "SELECT * FROM goutsmusicaux";
$resultGouts = mysqli_query($con, $sqlGouts);

// Fetch the data into an array
$dataGouts = array();
while ($row = mysqli_fetch_assoc($resultGouts)) {
    $dataGouts[] = $row;
}

$sqlPassions = "SELECT * FROM passions";
$resultPassions = mysqli_query($con, $sqlPassions);


$dataPassions = array();
while ($row = mysqli_fetch_assoc($resultPassions)) {
    $dataPassions[] = $row;
}

// Close the connection
mysqli_close($con);
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
                <?php foreach ($dataGouts as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['style']; ?></td>
                        <td><a href="modifierForm_gout.php?id=<?= $row['id']; ?>&style=<?= $row['style']; ?>">Modifier</a></td>
                        <td><a href="requetes/supprimer_gout.php?id=<?= $row['id']; ?>">Supprimer</a></td>
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
                <?php foreach ($dataPassions as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><a href="modifierForm_passion.php?id=<?= $row['id']; ?>&passion=<?= $row['nom']; ?>">Modifier</a></td>
                        <td><a href="requetes/supprimer_passion.php?id=<?= $row['id']; ?>">Supprimer</a></td>
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