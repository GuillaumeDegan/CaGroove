<?php
$id = $_GET['id'];
$passion = $_GET['passion'];
?>
</head>
<body>
<?php include '../header/header.php';?>
<h3>Modification</h3>
<form method="post" action="requetes/modifierSend_passion.php?id=<?= $id ?>">
    <label for="passion">Nom de la passion :</label>
    <input value="<?= $passion ?>" name="passion" type="text">
    <input type="submit">
</form>
<br />

<a href="index.php">Retour</a>