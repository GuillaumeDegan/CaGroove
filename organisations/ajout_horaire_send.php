<?php

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$horaire = $_POST['horaire'];
$idArtiste = $_POST['idArtiste'];
$idEvent = $_POST['idEvent'];


// database insert SQL code
$sql="INSERT INTO `organisation` (`horaires`, `idArtiste`, `idEvent`) VALUES ('$horaire', '$idArtiste', '$idEvent'); ";
$db->querySend($sql);

header('Location: index.php');

?>