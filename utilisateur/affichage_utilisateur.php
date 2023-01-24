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
$sql = "SELECT * FROM utilisateur";
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
            <th>Nom</th>
            <th>Prenom</th>
            <th>Emails</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th>Age</th>
            <th>idRole</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['prenom']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['telephone']; ?></td>
                <td><?php echo $row['adresse']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['idRole']; ?></td>
                <td><a href="modifier_artiste1.php?id=<?php echo $row['id']; ?> ">modifier</a></td>
                <td><a href="supprimer_artiste1.php?id=<?php echo $row['id']; ?> ">supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="ajout_utilisateur.html">ajouter un artiste</a>
<a href="../acceuil.html">acceuil</a>


    
</body>
</html>