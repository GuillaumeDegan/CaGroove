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
$data = $db->queryGET('SELECT * FROM event');
$array = json_decode(json_encode($data), true);
?>


</head>
<body>
<?php include '../header/header.php';?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Place</th>
            <th>Lieu</th>
            <th>Date</th>
            <th>modif</th>
            <th>supression</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($array as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['places']; ?></td>
                <td><?php echo $row['lieu']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><a href="modifier_event1.php?id=<?php echo $row['id']; ?> ">modifier</a></td>
                <td><a href="supprimer_event1.php?id=<?php echo $row['id']; ?> ">suppression</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajoutForm_event.php">ajouter un event</a>
<a href="../accueil.php">acceuil</a>
    
</body>
</html>