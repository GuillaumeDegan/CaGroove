<?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

// Delete all existing records for the user
$sql = "DELETE FROM `utilisateurspassions` WHERE `idUtilisateur` = '$id'";
$db->querySend($sql);

// Insert new records for the user's selected passions
$passionArray = $_POST['passion'];
foreach($passionArray as $passion) {
    $passionId = str_replace("g_", "", $passion);
    $sql = "INSERT INTO `utilisateurspassions` (`idUtilisateur`, `idPassion`) VALUES ('$id', '$passionId'); ";
    $db->querySend($sql);
}

header('Location: affichage_utilisateur.php');

?>