<?php
// database connection code
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$db->querySend("DELETE FROM utilisateursgouts WHERE `idUtilisateur` = $id ;");
$db->querySend("DELETE FROM utilisateurspassions WHERE `idUtilisateur` = $id ;");

$db->querySend("DELETE FROM utilisateur WHERE `utilisateur`.`id` = $id ;");

header('Location: affichage_utilisateur.php');
?>