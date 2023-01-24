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
$sql = "SELECT * FROM organisation";
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

    <h2>Horaires</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Horaires</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['horaires']; ?></td>
                    <td><a href="">Modifier</a></td>
                    <td><a href="">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br />

</div>
    
</body>
</html>