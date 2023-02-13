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
$sqlEvent = "SELECT * FROM event";
$resultEvent = mysqli_query($con, $sqlEvent);

// Fetch the data into an array
$dataEvent = array();
while ($row = mysqli_fetch_assoc($resultEvent)) {
    $dataEvent[] = $row;
}

// Close the connection
mysqli_close($con);
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
        <?php foreach ($dataEvent as $row): ?>
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