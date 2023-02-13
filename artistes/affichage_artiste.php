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
$sql = "SELECT * FROM artiste";
$result = mysqli_query($con, $sql);

// Fetch the data into an array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close the connection
mysqli_close($con);
?>
</head>
<body>


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
        <?php foreach ($data as $row): ?>
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
<a href="../acceuil.html">acceuil</a>


    
</body>
</html>