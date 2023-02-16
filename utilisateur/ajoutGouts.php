<!-- Page de formulaire d'ajout de nouveau gouts à un user -->

<?php 
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// génération du token
require "../nocsrf.php";
$token = NoCSRF::generate( 'token' );

// récupération de l'id de l'user
$id = $_GET['id'];

// récupération de otus les gouts musicaux
$Gouts = $db->queryGET("SELECT * FROM goutsmusicaux");

?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="ajoutGoutsSend.php?id=<?= $id ?>">
    <!-- Boucle qui affiche tous les gouts dans des checkboxs -->
        <?php foreach($Gouts as $gout) :?>
            <label for="gouts[]"><?= $gout->style ?></label>
            <input type="checkbox" name="gouts[]" value="g_<?= $gout->id ?>">
        <?php endforeach; ?>
        <input type="hidden" name="token" value="<?= $token ?>" />
        <input type="submit">
    </form>
</div>