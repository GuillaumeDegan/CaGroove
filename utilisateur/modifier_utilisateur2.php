<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$nom = $_POST['txtName'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$age = $_POST['age'];
$idRole = $_POST['idRole'];


// database insert SQL code
$sql="UPDATE `utilisateur` SET `nom` = '$nom', `prenom` = '$prenom', `email` = '$email', `telephone` = '$telephone', `adresse` = '$adresse', `age` = '$age', `idRole` = '$idRole' WHERE `utilisateur`.`id` = $id; ";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 


header('Location: affichage_utilisateur.php');

?>