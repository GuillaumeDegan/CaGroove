<?php
// database connection code
$id = $_GET['id'];

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$place = $_POST['places'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];
$nom = $_POST['nom'];


// database insert SQL code
$sql="UPDATE `event` SET  `nom` = '$nom', `places` = '$place', `lieu` = '$lieu', `date` = '$date' WHERE `id` = '$id';";
$db->querySend($sql);

 header('Location: affichage_event.php');
?>