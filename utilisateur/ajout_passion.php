<?php 
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$Passion = $db->queryGET("SELECT * FROM passions");
$arrayPassion = json_decode(json_encode($Passion), true);



?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="ajoutGoutsSend.php?id=<?= $id ?>">
        <?php foreach($arrayPassion as $passion) :?>
            <label for="gouts[]"><?= $passion['nom'] ?></label>
            <input type="checkbox" name="gouts[]" value="g_<?= $passion['id'] ?>">
        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>