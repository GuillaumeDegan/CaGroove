<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>


    <?php
    require "../database/connectDB.php";
    $db = new ConnectDB('cagroove');

    $submit_id = $_GET['id'];

    $data = $db->queryGET("SELECT id,nom,prenom,email,telephone,adresse,age,idRole FROM utilisateur WHERE id = $submit_id ;");
?>
  </head>


  <body>
  <?php include '../header/header.php';?>

    <fieldset>
      <legend>utilisateur</legend>
      <form name="frmContact" method="post" action="modifier_utilisateur2.php?id=<?= $data[0]->id ?>">
        
      <p>
          <label for="txtName">Nom </label>
          <input type="text" name="txtName" id="txtName" value="<?= htmlspecialchars($data[0]->nom)  ?>" />
        </p>
        <p>
          <label for="prenom">prenom</label>
          <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($data[0]->prenom) ?>"/>
        </p>
        <p>
          <label for="email">email</label>
          <input type="text" name="email" id="email" value="<?= htmlspecialchars($data[0]->email) ?>"/>
        </p>
        <p>
          <label for="telephone">telephone</label>
          <input type="text" name="telephone" id="telephone" value="<?= htmlspecialchars($data[0]->telephone) ?>"></input>
        </p>
        <p>
          <label for="adresse">adresse</label>
          <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($data[0]->adresse) ?>"/>
        </p>
        <p>
          <label for="age">age</label>
          <input type="text" name="age" id="age" value="<?= htmlspecialchars($data[0]->age) ?>" />
        </p>
        <p>
          <label for="idRole">idRole</label>
          <input type="text" name="idRole" id="idRole" value="1" />
        </p>

        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>

  </body>
</html>
