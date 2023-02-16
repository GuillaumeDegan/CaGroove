<!-- Page de traitement de suppression d'un user -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id user à supprimer
$id = $_GET['id'];

// suppréssion des champs liés à l'user dans la table utilisateursgouts et utilisateurspassions
$db->querySend("DELETE FROM utilisateursgouts WHERE `idUtilisateur` = $id ;");
$db->querySend("DELETE FROM utilisateurspassions WHERE `idUtilisateur` = $id ;");

// suppréssion de l'user en question
$db->querySend("DELETE FROM utilisateur WHERE `utilisateur`.`id` = $id ;");

// redirection
header('Location: affichage_utilisateur.php');
?>