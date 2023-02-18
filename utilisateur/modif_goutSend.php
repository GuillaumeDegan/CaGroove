<!-- Page de traitement du formulaire de modification des gouts  -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id de l'user
$id = $_GET['id'];

// Envoie de la requete de suppression de tous les gouts
$sql = "DELETE FROM `utilisateursgouts` WHERE `idUtilisateur` = ?";
$db->querySend($sql, [$id]);

// Récupération des checkboxs validées
$goutArray = $_POST['gout'];
foreach($goutArray as $gout) {
    // envoie des requetes pour ajouter les nouveaux gouts
    $goutId = str_replace("g_", "", $gout);
    $sql = "INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES (?, ?); ";
    $db->querySend($sql, [$id, $goutId]);
}

// redirection
header('Location: affichage_utilisateur.php');

?>