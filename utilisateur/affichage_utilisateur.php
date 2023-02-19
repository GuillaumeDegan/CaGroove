<!-- Page d'affichage des utilisateurs -->

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

// récupération de tous les utilisateurs
$data = $db->queryGET('SELECT utilisateur.id as id, utilisateur.nom as nom, prenom, email, telephone, adresse, age, role.nom  as role FROM utilisateur 
INNER JOIN role ON utilisateur.idRole = role.id group by utilisateur.nom ', null);

// préparation de la requete de récupération des gouts
$sqlGoutsRequest = "SELECT goutsmusicaux.style from utilisateursgouts inner join goutsmusicaux on utilisateursgouts.idGout = goutsmusicaux.id where utilisateursgouts.idUtilisateur = ?";

// préparation de la requete de récupération des passions
$sqlPassionsRequest = "SELECT passions.nom as nompassion, utilisateurspassions.idUtilisateur from utilisateurspassions inner join passions on utilisateurspassions.idPassion = passions.id where utilisateurspassions.idUtilisateur = ?";

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
            // execution de la requete des gouts et récupération des gouts selon l'utilisateur passé
            $GoutsData = $db->queryGET($sqlGoutsRequest, [$row->id]);
            
            // execution de la requete des passions et récupération des passions selon l'utilisateur passé
            $PassionsData = $db->queryGET($sqlPassionsRequest, [$row->id]);
            ?>
            <tr>
                <td><?= $row->id; ?></td>
                <td><?= htmlspecialchars($row->nom) ?></td>
                <td><?= htmlspecialchars($row->prenom) ?></td>
                <td><?= htmlspecialchars($row->email) ?></td>
                <td><?= htmlspecialchars($row->telephone) ?></td>
                <td><?= htmlspecialchars($row->adresse) ?></td>
                <td><?= htmlspecialchars($row->age) ?></td>
                <td><?= htmlspecialchars($row->role) ?></td>
                <td><a href="ajoutGouts.php?id=<?= htmlspecialchars($row->id) ?>">Ajouter des gouts</a></td>
                <!-- Boucle qui concatène tous les gouts de l'utilisateur séparés d'une virgule -->
                <td><p>
                    <?php foreach ($GoutsData as $gout): ?>
                    <?= htmlspecialchars($gout->style).', ' ?>
                    <?php endforeach; ?>
                </p></td>
                <td><a href="modif_gout_form.php?id=<?= htmlspecialchars($row->id) ?>">Modifier des gouts</a></td>
                <td><a href="ajout_passion.php?id=<?= htmlspecialchars($row->id) ?>">Ajouter des Passion</a></td>   
                <!-- Boucle qui concatène toutes les passions de l'utilisateur séparées d'une virgule -->
                <td><p>
                    <?php foreach ($PassionsData as $passion): ?>
                    <?= htmlspecialchars($passion->nompassion).', ' ?>
                    <?php endforeach; ?>
                </p></td> 
                <td><a href="modif_passion_form.php?id=<?= htmlspecialchars($row->id) ?>">modifier passion</a></td>
                <td><a href="modifier_utilisateur1.php?id=<?=  htmlspecialchars($row->id) ?> ">modifier</a></td>
                <td><a href="supprimer_utilisateur.php?id=<?=  htmlspecialchars($row->id) ?> ">supprimer</a></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajout_utilisateur.php">ajouter un utilisateur</a>


    
</body>
</html>