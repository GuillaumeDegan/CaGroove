<!-- Page de traitement du formulaire de création d'user -->

<?php
// connexion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération des données du formulaire à envoyer
$txtName = $_POST['txtName'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$age = $_POST['age'];
$idRole = $_POST['Role'];

// création et envoie de la requete 
$sql="INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `age`, `idRole`) VALUES (NULL, '$txtName', '$prenom', '$email', '$telephone', '$adresse','$age', '$idRole'); ";
$db->querySend($sql);

// redirection
header('Location: affichage_utilisateur.php');

?>