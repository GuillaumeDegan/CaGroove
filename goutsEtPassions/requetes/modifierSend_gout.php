<?php
// database connection code

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$id = $_POST['id'];
$style = $_POST['style'];

$db->querySend("UPDATE `goutsmusicaux` SET `style` = '$style', `id` = $id WHERE `id` = '$id';")

?>

<br />
<a href="../index.php">Retour</a>