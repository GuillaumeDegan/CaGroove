<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$id = $_GET['id'];
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records

// database insert SQL code
$sql="DELETE FROM artiste WHERE `artiste`.`id` = $id ;";

$db->querySend($sql);
header('Location: affichage_artiste.php');
?>