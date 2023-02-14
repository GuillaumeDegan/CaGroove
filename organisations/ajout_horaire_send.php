<!-- Page de traitement de nouvelle horaire provenant du formulaire -->

<?php

//connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération des données à envoyer
$horaire = $_POST['horaire'];
$idArtiste = $_POST['idArtiste'];
$idEvent = $_POST['idEvent'];


// création de la requete et envoie
$sql="INSERT INTO `organisation` (`horaires`, `idArtiste`, `idEvent`) VALUES ('$horaire', '$idArtiste', '$idEvent'); ";
$db->querySend($sql);

// redirection
header('Location: index.php');

?>