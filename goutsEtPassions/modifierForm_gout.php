<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', '','cagroove');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Close the connection
mysqli_close($con);

$id = $_GET['id'];
$gout = $_GET['style'];
?>
</head>
<body>
<?php include 'header/header.php';?>

<h3>Modification</h3>
<form method="post" action="requetes/modifierSend_gout.php">
    <label for="id">Id du gout musical :</label>
    <input value="<?= $id ?>" name="id" type="number">
    <label for="style">Nom du gout musical :</label>
    <input value="<?= $gout ?>" name="style" type="text">
    <input type="submit">
</form>
<br />

<a href="index.php">Retour</a>