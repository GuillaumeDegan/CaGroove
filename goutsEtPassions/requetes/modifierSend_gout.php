<!-- ¨Page de traitement de modification de gout -->

<?php
// connexion bdd
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récuperation de l'id du gout et de son nouveau nom
$id = $_GET['id'];
$style = $_POST['style'];

// envoie de la requete
$db->querySend("UPDATE `goutsmusicaux` SET `style` = ? WHERE `id` = ?;", [$style, $id]);

// redirection
header('Location: ../index.php');

?>
