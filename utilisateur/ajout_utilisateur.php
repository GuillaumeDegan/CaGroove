<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>
  </head>

  <?php

  require "../database/connectDB.php";
  $db = new ConnectDB('cagroove');
  $data = $db->queryGET('SELECT * FROM role');
  $array = json_decode(json_encode($data), true);

  ?>

  <body>
  <?php include '../header/header.php';?>
    <fieldset>
      <legend>utilisateur</legend>
      <form name="frmContact" method="post" action="ajout_utilisateur1.php">
        <p>
          <label for="txtName">Nom </label>
          <input type="text" name="txtName" id="txtName" />
        </p>
        <p>
          <label for="prenom">prenom</label>
          <input type="text" name="prenom" id="prenom" />
        </p>
        <p>
          <label for="email">email</label>
          <input type="text" name="email" id="email" />
        </p>
        <p>
          <label for="telephone">telephone</label>
          <textarea name="telephone" id="telephone"></textarea>
        </p>
        <p>
          <label for="adresse">adresse</label>
          <input type="text" name="adresse" id="adresse" />
        </p>
        <p>
          <label for="age">age</label>
          <input type="text" name="age" id="age" />
        </p>
        <p>
          <label for="Role">Rôle</label>
          <select name="Role">
            <option>Choisir un rôle</option>
            <?php foreach($array as $option): ?>
              <option value="<?= $option['id'] ?>"><?= $option['nom'] ?></option>
            <?php endforeach; ?>
          </select>
        </p>

        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
  </body>
</html>
