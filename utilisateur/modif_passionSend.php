<?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

// Delete all existing records for the user
$sql = "DELETE FROM `utilisateurspassions` WHERE `idUtilisateur` = ?";
$db->querySend($sql, [$id]);

// Insert new records for the user's selected passions
$passionArray = $_POST['passion'];
foreach($passionArray as $passion) {
    $passionId = str_replace("g_", "", $passion);
    $sql = "INSERT INTO `utilisateurspassions` (`idUtilisateur`, `idPassion`) VALUES (?, ?); ";
    $db->querySend($sql, [$id, $passionId]);
}

header('Location: affichage_utilisateur.php');

?>