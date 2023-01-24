<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$passion = $_POST['passion'];

// database insert SQL code
$sql="INSERT INTO `passions` (`id`, `nom`) VALUES (NULL, '$passion'); ";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 

?>

<a href="../index.php">Retour</a>