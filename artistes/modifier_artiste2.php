<?php
// database connection code
$id = $_GET['id'];
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$nom = $_POST['txtName'];
$style = $_POST['style'];
$reseaux = $_POST['reseaux'];
$nationaliter = $_POST['nationaliter'];


// database insert SQL code
$sql="UPDATE `artiste` SET `nom` = '$nom', `style` = '$style', `reseauxSociaux` = '$reseaux', `nationalite` = '$nationaliter' WHERE `artiste`.`id` = $id; ";

// insert in database 
$db->querySend($sql);

header('Location: affichage_artiste.php');
?>