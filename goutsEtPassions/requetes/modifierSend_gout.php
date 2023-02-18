<!-- ¨Page de traitement de modification de gout -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id du gout et de son nouveau nom
$id = $_GET['id'];
$style = ucfirst(strtolower($_POST['style']));

// recuperation de tous les styles de goutsmusicaux
$allStyles = $db->queryGET("SELECT style FROM goutsmusicaux", null);

// fonction qui vérifie si le gout existe pas deja
function checkIfAlreadyExist($style, $allStyles) {
    $returnValue = true;

    foreach($allStyles as $oneStyle) {
        if($oneStyle->style == $style) {
            $returnValue = false;
        }
    }

    return $returnValue;
}

if(checkIfAlreadyExist($style, $allStyles)) {
    // envoie de la requete
    $db->querySend("UPDATE `goutsmusicaux` SET `style` = ? WHERE `id` = ?;", [$style, $id]);

    // redirection
    header('Location: ../index.php');
} else {
    echo "Erreur, ce gout existe deja !";
    echo "<br />";
    echo "<a href='../index.php'>Retour</a>";
}



?>
