:<?php
// database connection code

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

// get the post records
$nom = $_POST['txtName'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$age = $_POST['age'];
$idRole = $_POST['idRole'];

$db->querySend("UPDATE `utilisateur` SET `nom` = '$nom', `prenom` = '$prenom', `email` = '$email', `telephone` = '$telephone', `adresse` = '$adresse', `age` = '$age', `idRole` = '$idRole' WHERE `utilisateur`.`id` = $id; ");

header('Location: affichage_utilisateur.php');

?>