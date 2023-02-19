<!-- Page de formulaire de modification d'une passion -->

<?php
//recuperation de son id et de son nom
$id = $_GET['id'];
$passion = $_GET['passion'];
?>
</head>
<body>
<?php include '../header/header.php';?>
<h3>Modification</h3>
<form method="post" action="requetes/modifierSend_passion.php?id=<?= htmlspecialchars($id) ?>">
    <label for="passion">Nom de la passion :</label>
    <input value="<?= htmlspecialchars($passion) ?>" name="passion" type="text">
    <input type="submit">
</form>
<br />

<a href="index.php">Retour</a>