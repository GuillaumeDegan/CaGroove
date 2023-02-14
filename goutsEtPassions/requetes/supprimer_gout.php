<!-- ¨Page de traitement de suppression de gout -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recuperation de l'id du gout a supprimer
$id = $_GET['id'];

// requete envoyée
$db->querySend("DELETE FROM `goutsmusicaux` WHERE `id` = $id");

// redirection
header('Location: ../index.php');
?>