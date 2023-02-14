<?php
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

// get the post records

// database insert SQL code
$sql="DELETE FROM artiste WHERE `artiste`.`id` = $id ;";

// insert in database 
$db->querySend($sql)

header('Location: affichage_artiste.php');
?>