<!-- Page de traitement du formulaire de modification de l'user -->

<?php
// connexion bdd

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id user
$id = $_GET['id'];

// récupération des données du formulaire à modifier
$nom = $_POST['txtName'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$age = $_POST['age'];
$idRole = $_POST['idRole'];

// envoie de la requete
$db->querySend("UPDATE `utilisateur` SET `nom` = ?, `prenom` = ?, `email` = ?, `telephone` = ?, `adresse` = ?, `age` = ?, `idRole` = ? WHERE `utilisateur`.`id` = ?; ", [$nom, $prenom, $email, $telephone, $adresse, $age, $idRole, $id]);

// redirection 
header('Location: affichage_utilisateur.php');

?>