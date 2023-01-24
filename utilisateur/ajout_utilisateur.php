<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$txtName = $_POST['txtName'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$age = $_POST['age'];
$idRole = $_POST['idRole'];

// database insert SQL code
$sql="INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `age`, `idRole`) VALUES (NULL, '$txtName', '$prenom', '$email', '$telephone', '$adresse','$age', '$idRole'); ";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 


header('Location: affichage_utilisateur.php');


?>