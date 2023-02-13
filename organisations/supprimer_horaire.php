<?php

require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// get the post records
$id = $_GET['id'];


$sql="DELETE FROM organisation WHERE id = $id ;";
$db->querySend($sql);

header('Location: index.php');

?>