<?php

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$txtName = $_POST['txtName'];
$style = $_POST['style'];
$reseaux = $_POST['reseaux'];
$nationaliter = $_POST['nationaliter'];

// database insert SQL code
$sql="INSERT INTO `artiste` (`id`, `nom`, `style`, `reseauxSociaux`, `nationalite`) VALUES (NULL, '$txtName', '$style', '$reseaux', '$nationaliter'); ";
$db->querySend($sql);

header('Location: affichage_artiste.php');

?>