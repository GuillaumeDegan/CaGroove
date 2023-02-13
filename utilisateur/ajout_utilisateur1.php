<?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$txtName = $_POST['txtName'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$age = $_POST['age'];
$idRole = $_POST['idRole'];

// database insert SQL code
$sql="INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `age`, `idRole`) VALUES (NULL, '$txtName', '$prenom', '$email', '$telephone', '$adresse','$age', '$idRole'); ";

$db->querySend($sql);

header('Location: affichage_utilisateur.php');


?>