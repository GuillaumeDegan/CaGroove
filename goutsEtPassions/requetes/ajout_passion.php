<!-- Page de traitement de l'ajout d'une nouvelle passion -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recuperation du nom de la nouvelle passion
$passion = $_POST['passion'];

// envoie de la requete 
$db->querySend("INSERT INTO `passions` (`id`, `nom`) VALUES (NULL, '$passion'); ");

//redirection
header('Location: ../index.php');

?>