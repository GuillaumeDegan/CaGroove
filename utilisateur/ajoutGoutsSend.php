<!-- Page de traitement du formulaire d'ajout de gouts -->

<?php

// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id user
$id = $_GET['id'];

// récupération de toutes les checkboxs gouts séléctionnées
$goutsArray = $_POST['gouts'];
// boucle qui envoie la requete d'ajout de l'utilisateur et du gout dans la table d'association utilisateursgouts
foreach($goutsArray as $gout) {
    $goutId = str_replace("g_", "", $gout);
    $db->querySend("INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES ('$id', '$goutId'); ");
}

// redirection
header('Location: affichage_utilisateur.php');

