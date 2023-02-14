<?php
// database connection code

require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$id = $_GET['id'];
$style = $_POST['style'];

$db->querySend("UPDATE `goutsmusicaux` SET `style` = '$style' WHERE `id` = '$id';");

header('Location: ../index.php');

?>
