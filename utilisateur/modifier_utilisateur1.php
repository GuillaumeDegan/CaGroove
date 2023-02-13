<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>


    <?php

$submit_id = $_GET['id'];
// Connect to the database
$con = mysqli_connect('localhost', 'root', '','cagroove');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all data from the table
$sql = "SELECT * FROM utilisateur WHERE id = $submit_id ;";
$result = mysqli_query($con, $sql);

// Fetch the data into an array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close the connection
mysqli_close($con);
?>
  </head>


  <body>
  <?php include '../header/header.php';?>
  <?php foreach ($data as $row): ?>
    <fieldset>
      <legend>utilisateur</legend>
      <form name="frmContact" method="post" action="modifier_utilisateur2.php?id=<?php echo $row['id']; ?>">
        
      <p>
          <label for="txtName">Nom </label>
          <input type="text" name="txtName" id="txtName" value="<?php echo $row['nom']; ?>" />
        </p>
        <p>
          <label for="prenom">prenom</label>
          <input type="text" name="prenom" id="prenom" value="<?php echo $row['prenom']; ?>"/>
        </p>
        <p>
          <label for="email">email</label>
          <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"/>
        </p>
        <p>
          <label for="telephone">telephone</label>
          <textarea name="telephone" id="telephone" value="<?php echo $row['telephone']; ?>"></textarea>
        </p>
        <p>
          <label for="adresse">adresse</label>
          <input type="text" name="adresse" id="adresse" value="<?php echo $row['adresse']; ?>"/>
        </p>
        <p>
          <label for="age">age</label>
          <input type="text" name="age" id="age" value="<?php echo $row['age']; ?>" />
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
    <?php endforeach; ?>
  </body>
</html>
