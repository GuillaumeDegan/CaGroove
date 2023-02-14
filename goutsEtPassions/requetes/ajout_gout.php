<?php
// database connection code

require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

$style = $_POST['style'];

$db->querySend("INSERT INTO `goutsmusicaux` (`id`, `style`) VALUES (NULL, '$style'); ");

header('Location: ../index.php');
?>
