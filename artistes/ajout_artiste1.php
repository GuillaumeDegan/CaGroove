<!-- Page d'atterissage du formulaire de création d'un nouvel artiste -->

<?php

// Connection bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération des données du formulaire
$txtName = $_POST['txtName'];
$style = $_POST['style'];
$reseaux = $_POST['reseaux'];
$nationaliter = $_POST['nationaliter'];

// vérification du token
require "../nocsrf.php";
if(NoCSRF::check( 'token', $_POST, true, 60*10, false )) {
    // envoie de la requete
    $sql="INSERT INTO `artiste` (`id`, `nom`, `style`, `reseauxSociaux`, `nationalite`) VALUES (NULL, '$txtName', '$style', '$reseaux', '$nationaliter'); ";
    $db->querySend($sql);

    // redirection vers l'affichage des artistes
    header('Location: affichage_artiste.php');
} else {
    // affichage d'erreur si token différent
    echo "Erreur de token";
    echo "<br />";
    echo "<a href='affichage_event.php'>Retour</a>";
}

?>