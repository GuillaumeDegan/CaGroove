<!-- ¨Page de traitement de suppression de la passion -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id de la passion a supprimer
$id = $_GET['id'];

// requete envoyée
$db->querySend("DELETE FROM `passions` WHERE `id` = ?", [$id]);

// redirection
header('Location: ../index.php');
?>
