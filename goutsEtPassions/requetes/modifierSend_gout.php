<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$id = $_POST['id'];
$style = $_POST['style'];

// database insert SQL code
$sql="UPDATE `goutsmusicaux` SET `style` = '$style', `id` = $id WHERE `id` = '$id';";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Modifié !";
} 

?>

<br />
<a href="../index.php">Retour</a>