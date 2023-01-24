<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$style = $_POST['style'];

// database insert SQL code
$sql="INSERT INTO `goutsmusicaux` (`id`, `style`) VALUES (NULL, '$style'); ";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 

?>

<a href="../index.php">Retour</a>