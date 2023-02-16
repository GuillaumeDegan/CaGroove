<!-- Page du formulaire d'ajout de passion à l'utilisateur souhaité -->

<?php 
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id de l'user en question
$id = $_GET['id'];

// récupération de toute les passions
$passions = $db->queryGET("SELECT * FROM passions");

?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="ajout_passionSend.php?id=<?= $id ?>">
    <!-- Boucle qui affiche toute les passions dans des checkboxs -->
        <?php foreach($passions as $passion) :?>
            <label for="passion[]"><?= $passion->nom ?></label>
            <input type="checkbox" name="passion[]" value="g_<?= $passion->id ?>">
        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>