<!-- Page de traitement de la suppression d'une horaire -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id de l'horaire a supprimer
$id = $_GET['id'];

// création de la requete et envoie
$sql="DELETE FROM organisation WHERE id = ? ;";
$db->querySend($sql, [$id]);

// redirection
header('Location: index.php');

?>