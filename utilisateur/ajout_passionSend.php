<!-- Page de traitement du formulaire d'ajout des passions -->

<?php

// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id de l'utilisateur 
$id = $_GET['id'];

// récupération de toute les checkboxs qui ont étées séléctionnées
$passionArray = $_POST['passion'];
// boucle qui envoie les nouvelles passions et l'utilisateur dans la table d'association utilisateurspassions
foreach($passionArray as $passion) {
    $passionId = str_replace("g_", "", $passion);
	$sql = "INSERT INTO `utilisateurspassions` (`idUtilisateur`, `idPassion`) VALUES ('$id', '$passionId'); ";
    $db->querySend($sql);
}

// redirection
header('Location: affichage_utilisateur.php');

