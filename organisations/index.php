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
$data = $db->query('SELECT * FROM organisation');
$array = json_decode(json_encode($data), true);
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
            <?php foreach ($array as $row): ?>
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