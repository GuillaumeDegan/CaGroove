<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cagroove');

// get the post records
$place = $_POST['places'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];

// database insert SQL code
$sql="INSERT INTO `event` (`id`, `places`, `lieu`, `date`) VALUES (NULL, '$place', '$lieu', '$date'); ";

// insert in database 
$rs=mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
} 
header('Location: affichage_event.php');
?>