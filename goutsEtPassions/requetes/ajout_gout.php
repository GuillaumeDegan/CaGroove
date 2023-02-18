<!-- Page de traitement de l'ajout d'un gout -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// recuperation du nom du nouveau gout
$style = $_POST['style'];

// envoie de la requete 
$db->querySend("INSERT INTO `goutsmusicaux` (`id`, `style`) VALUES (NULL, ?); ", [$style]);

//redirection
header('Location: ../index.php');
?>
