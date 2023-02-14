<?php

$con = mysqli_connect('localhost', 'root', '','cagroove');

$id = $_GET['id'];

$goutsArray = $_POST['gouts'];
foreach($goutsArray as $gout) {
    $goutId = str_replace("g_", "", $gout);
	$sql = "INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES ('$id', '$goutId'); ";
    $rs=mysqli_query($con, $sql);
}

var_dump($goutsArray);
header('Location: affichage_utilisateur.php');

