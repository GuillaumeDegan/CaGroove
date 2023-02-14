<!-- Page de traitement de la demande de suppression des artistes -->

<?php
// connection bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

//récupération de l'id de l'artiste
$id = $_GET['id'];

// création de la requete et envoie
$sql="DELETE FROM artiste WHERE `artiste`.`id` = $id ;";
$db->querySend($sql);

// redirection
header('Location: affichage_artiste.php');
?>