<!-- Page de traitement des informations provenant du formulaire d'ajout d'evenement -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération des données du formulaire
$nom = $_POST['nom'];
$place = $_POST['places'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];

// création de la requete et envoie
$sql="INSERT INTO `event` (`id`, `nom`, `places`, `lieu`, `date`) VALUES (NULL, '$nom', '$place', '$lieu', '$date'); ";
$db->querySend($sql);

// redirection
 header('Location: affichage_event.php');
?>