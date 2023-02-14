<?php
// database connection code
require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$id = $_GET['id'];
$passion = $_POST['passion'];

$db->querySend("UPDATE `passions` SET `nom` = '$passion' WHERE `id` = '$id';");

header('Location: ../index.php');
?>
