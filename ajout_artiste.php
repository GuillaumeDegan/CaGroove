<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$txtName = $_POST['txtName'];
$style = $_POST['style'];
$horaire = $_POST['horaire'];
$reseaux = $_POST['reseaux'];
$nationaliter = $_POST['nationaliter'];

// database insert SQL code
$sql="INSERT INTO `artiste` (`id`, `nom`, `style`, `idHoraire`, `reseauxSociaux`, `nationalite`) VALUES (NULL, '$txtName', '$style', '$horaire', '$reseaux', '$nationaliter'); ";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 
header('Location: affichage_artiste.php');

?>