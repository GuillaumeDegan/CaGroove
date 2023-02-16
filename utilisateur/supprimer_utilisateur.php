<!-- Page de traitement de suppression d'un user -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id user à supprimer
$id = $_GET['id'];

// suppréssion de l'user en question
$db->querySend("DELETE FROM utilisateur WHERE `utilisateur`.`id` = $id ;");

// redirection
header('Location: affichage_utilisateur.php');
?>