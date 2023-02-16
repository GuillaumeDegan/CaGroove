<!-- Page d'ajout d'un artiste -->

<?php 

// génération du token
require "../nocsrf.php";
$token = NoCSRF::generate( 'token' );

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>
  </head>

  <body>
  <?php include '../header/header.php';?>
    <fieldset>
      <legend>ARTISTE</legend>
      <form name="frmContact" method="post" action="ajout_artiste1.php">
        <p>
          <label for="txtName">Nom </label>
          <input type="text" name="txtName" id="txtName" />
        </p>
        <p>
          <label for="style">style</label>
          <input type="text" name="style" id="style" />
        </p>
        <p>
          <label for="reseaux">reseaux sociaux</label>
          <input type="text" name="reseaux" id="reseaux" />
        </p>
        <p>
          <label for="nationaliter">nationaliter</label>
          <input type="text" name="nationaliter" id="nationaliter" />
        </p>
        <input type="hidden" name="token" value="<?= $token ?>" />
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
  </body>
</html>
