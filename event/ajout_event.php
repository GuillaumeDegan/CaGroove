<?php
// database connection code

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$nom = $_POST['nom'];
$place = $_POST['places'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];

// database insert SQL code
$sql="INSERT INTO `event` (`id`, `nom`, `places`, `lieu`, `date`) VALUES (NULL, '$nom', '$place', '$lieu', '$date'); ";

$db->querySend($sql);

 header('Location: affichage_event.php');
?>