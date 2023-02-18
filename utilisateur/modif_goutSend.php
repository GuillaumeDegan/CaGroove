<?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

// Delete all existing records for the user
$sql = "DELETE FROM `utilisateursgouts` WHERE `idUtilisateur` = ?";
$db->querySend($sql, [$id]);

// Insert new records for the user's selected passions
$passionArray = $_POST['gout'];
foreach($passionArray as $passion) {
    $passionId = str_replace("g_", "", $passion);
    $sql = "INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES (?, ?); ";
    $db->querySend($sql, [$id, $passionId]);
}

header('Location: affichage_utilisateur.php');

?>