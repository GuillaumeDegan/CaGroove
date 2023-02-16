<?php 
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$passionTotal = $db->queryGet("SELECT id,style FROM goutsmusicaux");
$arrayPassionTotal = json_decode(json_encode($passionTotal), true);


$Passion = $db->queryGET("SELECT id,style FROM goutsmusicaux inner join utilisateursgouts on goutsmusicaux.id = utilisateursgouts.idGout where utilisateursgouts.idUtilisateur = $id ");

$arrayPassion = json_decode(json_encode($Passion), true);



?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="modif_goutSend.php?id=<?= $id ?>">
        <?php foreach($arrayPassionTotal as $passion) :
            $checked = '';
            foreach($arrayPassion as $userPassion) {
                if ($userPassion['id'] == $passion['id']) {
                    $checked = 'checked';
                    break;
                }
            }
        ?>
            <input type="checkbox" name="gout[]" value="g_<?= $passion['id'] ?>" <?= $checked ?>>
            <label for="gout[]"><?= $passion['style'] ?></label>
        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>