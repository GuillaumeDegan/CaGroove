<?php 
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$passionTotal = $db->queryGet("SELECT * FROM passions");
$arrayPassionTotal = json_decode(json_encode($passionTotal), true);


$Passion = $db->queryGET("SELECT * FROM passions inner join utilisateurspassions on passions.id = utilisateurspassions.idPassion where utilisateurspassions.idUtilisateur = $id ");

$arrayPassion = json_decode(json_encode($Passion), true);



?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="modif_passionSend.php?id=<?= $id ?>">
        <?php foreach($arrayPassionTotal as $passion) :
            $checked = '';
            foreach($arrayPassion as $userPassion) {
                if ($userPassion['id'] == $passion['id']) {
                    $checked = 'checked';
                    break;
                }
            }
        ?>
        

        <input type="checkbox" name="passion[]" value="g_<?= $passion['id'] ?>" <?= $checked ?>>
            <label for="passion[]"><?= $passion['nom'] ?></label>

        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>