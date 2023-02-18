<!-- Page de traitement du formulaire de modification des passions de l'user -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id de l'utilisateur en question
$id = $_GET['id'];

// Suppression de toutes les passions
$sql = "DELETE FROM `utilisateurspassions` WHERE `idUtilisateur` = ?";
$db->querySend($sql, [$id]);

// Récupration de toute les passions cochées 
$passionArray = $_POST['passion'];
// boucle qui envoie les requetes pour ajouter les nouvelles passions 
foreach($passionArray as $passion) {
    $passionId = str_replace("g_", "", $passion);
    $sql = "INSERT INTO `utilisateurspassions` (`idUtilisateur`, `idPassion`) VALUES (?, ?); ";
    $db->querySend($sql, [$id, $passionId]);
}

// redirection
header('Location: affichage_utilisateur.php');

?>