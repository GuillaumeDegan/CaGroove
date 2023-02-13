<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$nom = $_POST['txtName'];
$style = $_POST['style'];
$horaire = $_POST['horaire'];
$reseaux = $_POST['reseaux'];
$nationaliter = $_POST['nationaliter'];


// database insert SQL code
$sql="UPDATE `artiste` SET `nom` = '$nom', `style` = '$style', `idHoraire` = '$horaire', `reseauxSociaux` = '$reseaux', `nationalite` = '$nationaliter' WHERE `artiste`.`id` = $id; ";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 
header('Location: affichage_artiste.php');
?>