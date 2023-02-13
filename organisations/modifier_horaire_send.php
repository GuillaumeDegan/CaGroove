<?php

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$horaire = $_POST['horaire'];
$idArtiste = $_POST['idArtiste'];
$idEvent = $_POST['idEvent'];
$id = $_GET['id'];


// database insert SQL code
$sql="UPDATE `organisation` SET `horaires` = '$horaire', `idArtiste` = '$idArtiste', `idEvent` = '$idEvent' WHERE `id` = $id; ";
$db->querySend($sql);

header('Location: index.php');

?>