<?php
// database connection code
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$id = $_GET['id'];

$db->querySend("DELETE FROM `goutsmusicaux` WHERE `id` = $id");

header('Location: ../index.php');
?>