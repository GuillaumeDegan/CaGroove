<?php 
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$passionTotal = $db->queryGet("SELECT id,style FROM goutsmusicaux", null);


$Passion = $db->queryGET("SELECT id,style FROM goutsmusicaux inner join utilisateursgouts on goutsmusicaux.id = utilisateursgouts.idGout where utilisateursgouts.idUtilisateur = ? ", [$id]);



?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="modif_goutSend.php?id=<?= $id ?>">
        <?php foreach($passionTotal as $passion) :
            $checked = '';
            foreach($Passion as $userPassion) {
                if ($userPassion->id == $passion->id) {
                    $checked = 'checked';
                    break;
                }
            }
        ?>
            <input type="checkbox" name="gout[]" value="g_<?= htmlspecialchars($passion->id) ?>" <?= $checked ?>>
            <label for="gout[]"><?= htmlspecialchars($passion->style) ?></label>
        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>