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
$array = json_decode(json_encode($data), true);

function goutsBoucle($id, $db) {
    $data = $db->queryGET("SELECT goutsmusicaux.style, utilisateursgouts.idUtilisateur from utilisateursgouts inner join goutsmusicaux on utilisateursgouts.idGout = goutsmusicaux.id where utilisateursgouts.idUtilisateur = $id");
    $arrayData = json_decode(json_encode($data), true);
    return $arrayData;

}

var_dump(goutsBoucle(2,$db))
// $data2 = $db->queryGET('SELECT goutsmusicaux.style, utilisateursgouts.idUtilisateur from utilisateursgouts inner join goutsmusicaux on utilisateursgouts.idGout = goutsmusicaux.id where utilisateursgouts.idUtilisateur = 2 ');
// $array2 = json_decode(json_encode($data2), true);
// var_dump($data2)
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
            <th>modifier</th>
            <th>supprimer</th>
            <th>Gouts Musicaux</th>
            <th>Gouts</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($array as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['prenom']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['telephone']; ?></td>
                <td><?php echo $row['adresse']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td><a href="modifier_utilisateur1.php?id=<?php echo $row['id']; ?> ">modifier</a></td>
                <td><a href="supprimer_utilisateur.php?id=<?php echo $row['id']; ?> ">supprimer</a></td>
                <td><a href="ajoutGouts.php?id=<?= $row['id']; ?>">Ajouter des gouts</a></td>
                
               <?php ?>
<td><p><?php foreach (goutsBoucle($row['id'], $db) as $textGout): ?> 
    <?= $textGout['style'].', ' ?>
<?php endforeach; ?></p></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajout_utilisateur.php">ajouter un utilisateur</a>
<a href="../accueil.php">acceuil</a>


    
</body>
</html>