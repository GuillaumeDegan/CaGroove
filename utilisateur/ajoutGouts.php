<?php 
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

$id = $_GET['id'];

$Gouts = $db->queryGET("SELECT * FROM goutsmusicaux");

$arrayGouts = json_decode(json_encode($Gouts), true);

// Select all data from the table
// $sqlGouts = "SELECT * FROM goutsmusicaux";
// $resultGouts = mysqli_query($con, $sqlGouts);

// // Fetch the data into an array
// $dataGouts = array();
// while ($row = mysqli_fetch_assoc($resultGouts)) {
//     $dataGouts[] = $row;
// }

// Close the connection
// mysqli_close($con);


?>
<?php include '../header/header.php';?>
<div>
    <form method="post" action="ajoutGoutsSend.php?id=<?= $id ?>">
        <?php foreach($arrayGouts as $gout) :?>
            <label for="gouts[]"><?= $gout['style'] ?></label>
            <input type="checkbox" name="gouts[]" value="g_<?= $gout['id'] ?>">
        <?php endforeach; ?>
        <input type="submit">
    </form>
</div>