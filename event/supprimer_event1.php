<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$id = $_GET['id'];
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records

// database insert SQL code
$sql="DELETE FROM event WHERE `event`.`id` = $id ;";

$db->querySend($sql);

header('Location: affichage_event.php');
?>