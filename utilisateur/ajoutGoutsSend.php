<?php

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$goutsArray = $_POST['gouts'];
foreach($goutsArray as $gout) {
    $goutId = str_replace("g_", "", $gout);
    $db->querySend("INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES ('$id', '$goutId'); ")
}

header('Location: affichage_utilisateur.php');

