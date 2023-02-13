<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$id = $_GET['id'];

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$place = $_POST['places'];
$lieu = $_POST['lieu'];
$date = $_POST['date'];


// database insert SQL code
$sql="UPDATE `event` SET `places` = '$place', `lieu` = '$lieu', `date` = '$date' WHERE `event`.`id` = '$id';";
$db->querySend($sql);

header('Location: affichage_event.php');
?>