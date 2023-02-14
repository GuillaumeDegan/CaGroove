<?php
$id = $_GET['id'];
$passion = $_GET['passion'];
?>
</head>
<body>
<?php include 'header/header.php';?>
<h3>Modification</h3>
<form method="post" action="requetes/modifierSend_gout.php">
    <label for="id">Id de la passion :</label>
    <input value="<?= $id ?>" name="id" type="number">
    <label for="passion">Nom de la passion :</label>
    <input value="<?= $passion ?>" name="passion" type="text">
    <input type="submit">
</form>
<br />

<a href="index.php">Retour</a>