<!-- Page de traitement du formulaire de création d'user -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération des données du formulaire à envoyer
$txtName = $_POST['txtName'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$age = $_POST['age'];
$idRole = $_POST['Role'];

// vérification du token 
require "../nocsrf.php";
if(NoCSRF::check( 'token', $_POST, true, 60*10, false )) {
    // création et envoie de la requete 
    $sql="INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `age`, `idRole`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?); ";
    $db->querySend($sql, [$txtName, $prenom, $email, $telephone, $adresse, $age, $idRole]);

    // redirection
    header('Location: affichage_utilisateur.php');
} else {
    // affichage d'erreur si token différent
    echo "Erreur de token";
    echo "<br />";
    echo "<a href='affichage_event.php'>Retour</a>";
}

?>