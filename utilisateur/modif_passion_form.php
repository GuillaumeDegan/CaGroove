<!-- Page du formulaire de modification des passions de l'user -->

<?php 
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recpueration de l'id de l'user en question
$id = $_GET['id'];

// récupération de toutes les passions
$passionTotal = $db->queryGet("SELECT id,nom FROM passions", null);

// récupération des passions deja présentes
$Passion = $db->queryGET("SELECT id,nom FROM passions inner join utilisateurspassions on passions.id = utilisateurspassions.idPassion where utilisateurspassions.idUtilisateur = ? ", [$id]);

?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="modif_passionSend.php?id=<?= $id ?>">
    <!-- Boucle qui affiche les checkboxs de toutes les passions -->
        <?php foreach($passionTotal as $passion) :
            $checked = '';
            // boucle qui valide les checkboxs des passions déjà présentes
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