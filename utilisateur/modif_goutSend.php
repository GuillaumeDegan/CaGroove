<?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

// Delete all existing records for the user
$sql = "DELETE FROM `utilisateursgouts` WHERE `idUtilisateur` = '$id'";
$db->querySend($sql);

// Insert new records for the user's selected passions
$passionArray = $_POST['gout'];
foreach($passionArray as $passion) {
    $passionId = str_replace("g_", "", $passion);
    $sql = "INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES ('$id', '$passionId'); ";
    $db->querySend($sql);
}

header('Location: affichage_utilisateur.php');

?>