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

$data = $db->queryGET('SELECT utilisateur.id as id, utilisateur.nom as nom, prenom, email, telephone, adresse, age, role.nom  as role FROM utilisateur 
INNER JOIN role ON utilisateur.idRole = role.id group by utilisateur.nom ');

$sqlGoutsRequest = "SELECT goutsmusicaux.style from utilisateursgouts inner join goutsmusicaux on utilisateursgouts.idGout = goutsmusicaux.id where utilisateursgouts.idUtilisateur = ?";
$GoutsPrepared = $db->prepare($sqlGoutsRequest);

$sqlPassionsRequest = "SELECT passions.nom as nompassion, utilisateurspassions.idUtilisateur from utilisateurspassions inner join passions on utilisateurspassions.idPassion = passions.id where utilisateurspassions.idUtilisateur = ?";
$PassionsPrepared = $db->prepare($sqlPassionsRequest);

?>
</head>
<body>
<?php include '../header/header.php';?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Emails</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th>Age</th>
            <th>Rôle</th>
            <th>Gouts Musicaux</th>
            <th>Gouts</th>
            <th>modifier Gouts</th>
            <th>Ajout Passions</th>
            <th>Passions</th>
            <th>modifier passion</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row):
            $GoutsPrepared->execute([$row->id]);
            $GoutsData = $GoutsPrepared->fetchAll(PDO::FETCH_OBJ);
            
            $PassionsPrepared->execute([$row->id]);
            $PassionsData = $PassionsPrepared->fetchAll(PDO::FETCH_OBJ);
            ?>
            <tr>
                <td><?= $row->id; ?></td>
                <td><?= $row->nom ?></td>
                <td><?= $row->prenom ?></td>
                <td><?= $row->email ?></td>
                <td><?= $row->telephone ?></td>
                <td><?= $row->adresse ?></td>
                <td><?= $row->age ?></td>
                <td><?= $row->role ?></td>
                <td><a href="ajoutGouts.php?id=<?= $row->id ?>">Ajouter des gouts</a></td>
                <td><p>
                    <?php foreach ($GoutsData as $gout): ?>
                    <?= $gout->style.', ' ?>
                    <?php endforeach; ?>
                </p></td>
                <td><a href="modif_gout_form.php?id=<?= $row->id ?>">Modifier des gouts</a></td>
                <td><a href="ajout_passion.php?id=<?= $row->id ?>">Ajouter des Passion</a></td>   
                <td><p>
                    <?php foreach ($PassionsData as $passion): ?>
                    <?= $passion->nompassion.', ' ?>
                    <?php endforeach; ?>
                </p></td> 
                <td><a href="modif_passion_form.php?id=<?= $row->id ?>">modifier passion</a></td>
                <td><a href="modifier_utilisateur1.php?id=<?= $row->id ?> ">modifier</a></td>
                <td><a href="supprimer_utilisateur.php?id=<?= $row->id ?> ">supprimer</a></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajout_utilisateur.php">ajouter un utilisateur</a>


    
</body>
</html>