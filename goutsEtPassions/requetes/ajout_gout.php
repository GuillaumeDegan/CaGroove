<!-- Page de traitement de l'ajout d'un gout -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recuperation du nom du nouveau gout en changeant son format
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
    $db->querySend("INSERT INTO `goutsmusicaux` (`id`, `style`) VALUES (NULL, ?); ", [$style]);
    
    //redirection
    header('Location: ../index.php');
} else {
    echo "Erreur, ce gout existe deja !";
    echo "<br />";
    echo "<a href='../index.php'>Retour</a>";
}

?>
