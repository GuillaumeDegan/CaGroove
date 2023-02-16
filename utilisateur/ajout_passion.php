<?php 
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$Passion = $db->queryGET("SELECT nom, id FROM passions");
$arrayPassion = json_decode(json_encode($Passion), true);



?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="ajout_passionSend.php?id=<?= $id ?>">
        <?php foreach($arrayPassion as $passion) :?>
            <label for="passion[]"><?= $passion['nom'] ?></label>
            <input type="checkbox" name="passion[]" value="g_<?= $passion['id'] ?>">
        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>