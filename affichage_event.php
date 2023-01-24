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
$sql = "SELECT * FROM event";
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
            <th>Place</th>
            <th>Lieu</th>
            <th>Date</th>
            <th>modif</th>
            <th>supression</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
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

<a href="ajout_event.html">ajouter un event</a>

    
</body>
</html>