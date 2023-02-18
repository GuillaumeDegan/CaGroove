<!-- Page du formulaire d'ajout d'utilisateur -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>
  </head>

  <?php

  // génération du token
  require "../nocsrf.php";
  $token = NoCSRF::generate( 'token' );

// connexiojn bdd
  require "../database/connectDB.php";
  $db = new ConnectDB('cagroove');
  // récupération de tous les roles
  $data = $db->queryGET('SELECT id, nom FROM role', null);


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
          <input type="text" name="telephone" id="telephone"></input>
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
            <!-- Boucle qui affiche tous les rôles dans un select -->
            <?php foreach($data as $option): ?>
              <option value="<?= htmlspecialchars($option->id) ?>"><?= htmlspecialchars($option->nom) ?></option>
            <?php endforeach; ?>
          </select>
        </p>

        <input type="hidden" name="token" value="<?= $token ?>" />
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
  </body>
</html>
