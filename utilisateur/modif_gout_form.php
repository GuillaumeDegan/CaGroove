<!-- Page du formulaire de modification des gouts d'un user -->

<?php 
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id de l'user en question
$id = $_GET['id'];

// récupération de tous les gouts
$goutTotal = $db->queryGet("SELECT id,style FROM goutsmusicaux", null);

// récupération des gouts à modifier
$Gout = $db->queryGET("SELECT id,style FROM goutsmusicaux inner join utilisateursgouts on goutsmusicaux.id = utilisateursgouts.idGout where utilisateursgouts.idUtilisateur = ? ", [$id]);



?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="modif_goutSend.php?id=<?= $id ?>">
    <!-- Boucle qui affiche les checkboxs de tous les gouts -->
        <?php foreach($goutTotal as $gout) :
            $checked = '';
            // boucle qui valide les checkboxs des gouts existants
            foreach($Gout as $userGout) {
                if ($userGout->id == $gout->id) {
                    $checked = 'checked';
                    break;
                }
            }
        ?>
            <input type="checkbox" name="gout[]" value="g_<?= htmlspecialchars($gout->id) ?>" <?= $checked ?>>
            <label for="gout[]"><?= htmlspecialchars($gout->style) ?></label>
        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>