<!-- Page de traitement de l'ajout d'une nouvelle passion -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recuperation du nom de la nouvelle passion en changeant son format
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
    $db->querySend("INSERT INTO `passions` (`id`, `nom`) VALUES (NULL, ?); ", [$passion]);

    //redirection
    header('Location: ../index.php');
} else {
    echo "Erreur, cette passion existe deja !";
    echo "<br />";
    echo "<a href='../index.php'>Retour</a>";
}

?>