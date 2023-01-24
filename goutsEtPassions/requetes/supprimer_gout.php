<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$id = $_GET['id'];

// database insert SQL code
$sql="DELETE FROM `goutsmusicaux` WHERE `id` = $id";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Supprimé !";
} 

?>

<br />
<a href="../index.php">Retour</a>