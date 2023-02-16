<!-- Page de modification d'un artiste : le formulaire -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>


    <?php

// conncetion bdd
require "../database/connectDB.php";
$db = new ConnectDB('cagroove');

// récupération de l'id de l'artiste à modifier
$submit_id = $_GET['id'];

//récupération de l'artiste en question
$data = $db->queryGET("SELECT * FROM artiste WHERE id = $submit_id ;")

?>
  </head>


  <body>
  <?php include '../header/header.php';?>
 
    <fieldset>
      <legend>EVENT</legend>
      <form name="frmContact" method="post" action="modifier_artiste2.php?id=<?php echo htmlspecialchars($data[0]->id); ?>">
        
      <p>
          <label for="txtName">Nom </label>
          <input type="text" name="txtName" id="txtName" value="<?php echo htmlspecialchars($data[0]->nom); ?>" />
        </p>
        <p>
          <label for="style">style</label>
          <input type="text" name="style" id="style" value="<?php echo htmlspecialchars($data[0]->style); ?>" />
        </p>
        <p>
          <label for="reseaux">reseaux sociaux</label>
          <input type="text" name="reseaux" id="reseaux" value="<?php echo htmlspecialchars($data[0]->reseauxSociaux); ?>"></input>
        </p>
        <p>
          <label for="nationaliter">nationaliter</label>
          <input type="text" name="nationaliter" id="nationaliter" value="<?php echo htmlspecialchars($data[0]->nationalite); ?>"/>
        </p>
        <p>

        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>

  </body>
</html>
