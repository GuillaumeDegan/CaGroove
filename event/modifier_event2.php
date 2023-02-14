<!-- Page de traitement du formulaire de modification d'un evenement -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id de l'event a modifier
$id = $_GET['id'];

// récuperation des données à modifier
$place = $_POST['places'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];
$nom = $_POST['nom'];


// création de la requete et envoie
$sql="UPDATE `event` SET  `nom` = '$nom', `places` = '$place', `lieu` = '$lieu', `date` = '$date' WHERE `id` = '$id';";
$db->querySend($sql);

// redirection
 header('Location: affichage_event.php');
?>