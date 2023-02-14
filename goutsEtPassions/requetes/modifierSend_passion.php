<!-- ¨Page de traitement de modification de la passion -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id de la passion et de son nouveau nom
$id = $_GET['id'];
$passion = $_POST['passion'];

// envoie de la requete
$db->querySend("UPDATE `passions` SET `nom` = '$passion' WHERE `id` = '$id';");

// redirection
header('Location: ../index.php');
?>
