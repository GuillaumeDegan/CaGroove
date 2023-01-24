<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$id = $_POST['id'];
$passion = $_POST['passion'];

// database insert SQL code
$sql="UPDATE `passions` SET `nom` = '$passion', `id` = $id WHERE `id` = '$id';";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Modifié !";
} 

?>

<br />
<a href="../index.php">Retour</a>