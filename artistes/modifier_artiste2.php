<!-- Page de d'envoie des modifications du formulaire de modification de l'artiste -->

<?php
// connection bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération id de l'artiste
$id = $_GET['id'];


// récupération nouvelle données à modifier
$nom = $_POST['txtName'];
$style = $_POST['style'];
$reseaux = $_POST['reseaux'];
$nationaliter = $_POST['nationaliter'];

// vérification du token 
require "../nocsrf.php";
if(NoCSRF::check( 'token', $_POST, true, 60*10, false )) {
    // création de la requete et envoie
    $sql="UPDATE `artiste` SET `nom` = '$nom', `style` = '$style', `reseauxSociaux` = '$reseaux', `nationalite` = '$nationaliter' WHERE `artiste`.`id` = $id; ";
    $db->querySend($sql);

    // redirection vers l'affichage
    header('Location: affichage_artiste.php');
} else {
    // affichage d'erreur si token différent
    echo "Erreur de token";
    echo "<br />";
    echo "<a href='affichage_event.php'>Retour</a>";
}
?>