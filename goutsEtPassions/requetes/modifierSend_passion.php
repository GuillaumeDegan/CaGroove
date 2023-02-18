<!-- ¨Page de traitement de modification de la passion -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id de la passion et de son nouveau nom
$id = $_GET['id'];
$passion = ucfirst(strtolower($_POST['passion']));

// recuperation de toutes les passions
$allPassions = $db->queryGET("SELECT nom FROM passions", null);

// fonction qui vérifie si le gout existe pas deja
function checkIfAlreadyExist($passion, $allPassions) {
    $returnValue = true;

    foreach($allPassions as $onePassion) {
        if($onePassion->nom == $passion) {
            $returnValue = false;
        }
    }

    return $returnValue;
}

if(checkIfAlreadyExist($passion, $allPassions)) {
    // envoie de la requete
    $db->querySend("UPDATE `passions` SET `nom` = ? WHERE `id` = ?;", [$passion, $id]);

    // redirection
    header('Location: ../index.php');
} else {
    echo "Erreur, cette passion existe deja !";
    echo "<br />";
    echo "<a href='../index.php'>Retour</a>";
}


?>
