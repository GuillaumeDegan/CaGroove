<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$place = $_POST['places'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];

$selected = $_POST["horaires"];
foreach($selected as $horaire) {
	$sql = "INSERT INTO `eventorganisation` (`idEvent`, `idHoraire`) VALUES (NULL, '$place', '$lieu', '$date'); ";
}

// database insert SQL code
$sql="INSERT INTO `event` (`id`, `places`, `lieu`, `date`) VALUES (NULL, '$place', '$lieu', '$date'); ";

$db->querySend($sql);

 header('Location: affichage_event.php');
?>