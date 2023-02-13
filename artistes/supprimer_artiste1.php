<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$id = $_GET['id'];
$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records

// database insert SQL code
$sql="DELETE FROM artiste WHERE `artiste`.`id` = $id ;";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 
header('Location: affichage_artiste.php');
?>