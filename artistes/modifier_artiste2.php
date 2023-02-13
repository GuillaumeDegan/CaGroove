<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$id = $_GET['id'];
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$nom = $_POST['txtName'];
$style = $_POST['style'];
$horaire = $_POST['horaire'];
$reseaux = $_POST['reseaux'];
$nationaliter = $_POST['nationaliter'];


// database insert SQL code
$sql="UPDATE `artiste` SET `nom` = '$nom', `style` = '$style', `idHoraire` = '$horaire', `reseauxSociaux` = '$reseaux', `nationalite` = '$nationaliter' WHERE `artiste`.`id` = $id; ";

// insert in database 
$db->querySend($sql);

header('Location: affichage_artiste.php');
?>