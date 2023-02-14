<?php
// database connection code
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$id = $_POST['id'];
$passion = $_POST['passion'];

$db->querySend("UPDATE `passions` SET `nom` = '$passion', `id` = $id WHERE `id` = '$id';")

?>

<br />
<a href="../index.php">Retour</a>