<?php 
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$passionTotal = $db->queryGet("SELECT id,nom FROM passions", null);

$Passion = $db->queryGET("SELECT id,nom FROM passions inner join utilisateurspassions on passions.id = utilisateurspassions.idPassion where utilisateurspassions.idUtilisateur = ? ", [$id]);

?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="modif_passionSend.php?id=<?= $id ?>">
        <?php foreach($passionTotal as $passion) :
            $checked = '';
            foreach($Passion as $userPassion) {
                if ($userPassion->id == $passion->id) {
                    $checked = 'checked';
                    break;
                }
            }
        ?>
        

        <input type="checkbox" name="passion[]" value="g_<?= htmlspecialchars($passion->id) ?>" <?= $checked ?>>
            <label for="passion[]"><?= htmlspecialchars($passion->nom) ?></label>

        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>