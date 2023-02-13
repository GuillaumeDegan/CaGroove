<?php

$con = mysqli_connect('localhost', 'root', '','cagroove');

$id = $_GET['id'];

$passionArray = $_POST['passion'];
foreach($passionArray as $passion) {
    $passionId = str_replace("g_", "", $passion);
	$sql = "INSERT INTO `utilisateurspassions` (`idUtilisateur`, `idPassion`) VALUES ('$id', '$passionId'); ";
    $db->querySend($sql);
}

var_dump($passionArray);

