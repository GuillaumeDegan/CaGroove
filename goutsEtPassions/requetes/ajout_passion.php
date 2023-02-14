<?php
// database connection code

require "../../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$passion = $_POST['passion'];

$db->querySend("INSERT INTO `passions` (`id`, `nom`) VALUES (NULL, '$passion'); ");

header('Location: ../index.php');

?>