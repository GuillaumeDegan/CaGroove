<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');
$data = $db->query('SELECT * FROM artiste');
$array = json_decode(json_encode($data), true);
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
            <th>Horaire</th>
            <th>Reseaux Sociaux</th>
            <th>Nationaliter</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($array as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['style']; ?></td>
                <td><?php echo $row['idHoraire']; ?></td>
                <td><?php echo $row['reseauxSociaux']; ?></td>
                <td><?php echo $row['nationalite']; ?></td>
                <td><a href="modifier_artiste1.php?id=<?php echo $row['id']; ?> ">modifier</a></td>
                <td><a href="supprimer_artiste1.php?id=<?php echo $row['id']; ?> ">supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajout_artiste.php">ajouter un artiste</a>
<a href="../acceuil.php">acceuil</a>


    
</body>
</html>