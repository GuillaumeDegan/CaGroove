<!-- Page de traitement du formulaire de modification d'une horaire -->

<?php

//connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation des donnees a modifier
$horaire = $_POST['horaire'];
$idArtiste = $_POST['idArtiste'];
$idEvent = $_POST['idEvent'];
$id = $_GET['id'];


// création requete et envoie
$sql="UPDATE `organisation` SET `horaires` = ?, `idArtiste` = ?, `idEvent` = ? WHERE `id` = ?; ";
$db->querySend($sql, [$horaire, $idArtiste, $idEvent, $id]);

// redirection
header('Location: index.php');

?>