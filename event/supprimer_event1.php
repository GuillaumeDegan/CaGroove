<!-- Page de traitement de la demande de suppression d'un evenement -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

//recuperation id de l'event à supprimer
$id = $_GET['id'];

// Création de la requete et envoie
$sql="DELETE FROM event WHERE `event`.`id` = $id ;";
$db->querySend($sql);

// redirection
header('Location: affichage_event.php');
?>